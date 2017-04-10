(function ( $ ) {
	$.fn.sliderSimple = function() {
		var id = this.attr('id');
	    var currentIndex = 0,
	    items = $('#' + id + ' li'),
	    itemAmt = items.length; 
	    function cycleItems() {
	      var item = $('#' + id + ' li').eq(currentIndex);
	      items.removeClass('active');
	      item.addClass('active');
	      //item.css('display','block');
	    }

	    var autoSlide = setInterval(function() {
	      currentIndex += 1;
	      if (currentIndex > itemAmt - 1) {
	        currentIndex = 0;
	      }
	      cycleItems();
	    }, 2000);
	};
}( jQuery ));