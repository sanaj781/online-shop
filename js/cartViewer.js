var counts = $("#phpVarCartCounter").val();
counts = parseInt(counts);
var currentFontSize = $(".counter").css("font-size");
currentFontSize = parseInt(currentFontSize);

$(document).ready(function () {
  $(".counter").text(counts);
});

// animation when item added or removed
function basketCounterAnimation() {
  //zoom-in and insert new value
  $(".counter").text(counts);
    }
function basketRowQtyAnimation(rowId, qty) {
  $("#qty" + rowId).text(qty);
}

function endPriceAnimation() {
  $(".wholePrice").text("Whole price: " + endPrice + " $");
}
