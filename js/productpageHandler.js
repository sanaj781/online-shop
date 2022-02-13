//background submiting of the form if js is enabled

$(document).ready(function () {
  let rowID = $("#phpVarRowId").val();
  let rowTitle = $("#phpVarRowTitle").val();
  $("form").on("submit", function (e) {
    e.preventDefault();
    let dataString = $(this).serialize();
    let value = $("#qty").val();
    if (value >= 1) {
      $.ajax({
        type: "POST",
        url:
          "?page=product-page&id=" +
          rowID +
          "&product=" +
          rowTitle +
          "&action=add",
        data: dataString,
        success: function () {
          modalItemAdded();
        },
      });
    }
    else{
      alert ("Please choose amount before adding to basket!");
    }
  });

  function modalItemAdded() {
    let qty = $("#qty").val();
    qty = parseInt(qty);
    let rowPrice = $("#phpVarRowPrice").val();
    rowPrice = parseInt(rowPrice);
    counts += +qty;
    modalprice = qty * rowPrice;

    basketCounterAnimation();
    $("#itemqty").text("Quantity: " + qty + " pcs.");
    $("#modalprice").text("Price: " + modalprice + "$");

    $("#modal-item-added").fadeIn("slow", function () {
      $("body").css({
        overflow: "hidden",
      });
    });
  }

  //Modal handler for picture view
  $(".product-image, .small-product-image").click(function () {
    $("#modal-picture-view").fadeIn("slow", function () {
      $("body").css({
        overflow: "hidden",
      });
    });
  });

  $(".close-modal").click(function () {
    $("#modal-picture-view").fadeOut("slow", function () {
      $("body").css({
        overflow: "visible",
      });
    });
  });

  //Modal handler for added item
  $("#close-modal").click(function () {
    $("#modal-item-added").fadeOut("slow", function () {
      $("body").css({
        overflow: "visible",
      });
    });
  });
});

$("#qty").focus(function () {
  $("#qty").attr("value", "");
});
$("#qty").focusout(function () {
  $("#qty").attr("value", "1");
});
