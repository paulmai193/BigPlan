$(document).on("pagecreate", function() {
	pressEffectCard('card0');
	pressEffectCard('card1');
	pressEffectCard('card2');
	pressEffectCard('card3');
})

// press effect card ui
function pressEffectCard(x) {
    var id = $("#" + x); // cache the selector of the element, increases performance
    id.off('touchstart').on('touchstart', function() {
        id.addClass("holoPressEffectDiv");
    });
    id.off('touchend').on('touchend', function() {
        id.removeClass("holoPressEffectDiv");
    });
    id.off('touchmove').on('touchmove', function() {
        id.removeClass("holoPressEffectDiv"); // to remove the press effect when there is a scroll detected in stead of a tap
    });
}