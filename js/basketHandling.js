let endPrice = $("#phpVarEndPrice").val();
endPrice = parseInt(endPrice);


$(document).ready(function () {
  $(".wholePrice").text("Whole price: " + endPrice + "$");




  $("#buy").click(function (e) {
    e.preventDefault();
    $("#modal-create-order").fadeIn("slow", function () {
      $("body").css({
        "overflow": "hidden"
      });
    });

  })

  $("#submit-order").on("submit", function (e) {
    e.preventDefault();
    if ($("#FormControlTextarea").val().length !== 0 && $("#exampleInputEmail1").val().length !== 0) {

      let dataString = $(this).serialize();
      $.ajax({
        type: "GET",
        url: "?page=basket&action=buy",
        data: dataString,
        success: function () {
          window.location.href = "?page=basket&action=buy";
        },
      });

    }
  })


  $("#close-modal").click(function () {
    $("#modal-create-order").fadeOut("slow", function () {
      $("body").css({
        "overflow": "visible"
      });
    })

  })
});
//Increase/decrease butons handler
function increase(rowId, rowPrice) {
  endPrice += +rowPrice;
  counts += +1;

  $(".counter").text(counts);

  $.ajax({
    type: "POST",
    url: "?page=basket&id=" + rowId + "&action=increase",

    success: function () {
      let qty = parseInt($("#qty" + rowId).text());
      qty += +1;
      basketRowQtyAnimation(rowId, qty);
      endPriceAnimation();
      basketCounterAnimation();
    },
  });
}

function decrease(rowId, rowPrice) {
  if (counts > 0) {
    endPrice -= rowPrice;
    counts += -1;

    $(".counter").text(counts);

    $.ajax({
      type: "POST",
      url: "?page=basket&id=" + rowId + "&action=decrease",

      success: function () {
        let qty = parseInt($("#qty" + rowId).text());
        qty -= 1;
        if (qty === 0) {
          location.reload();
        }
        basketRowQtyAnimation(rowId, qty);
        basketCounterAnimation();
        endPriceAnimation();
      },
    });
  }
}