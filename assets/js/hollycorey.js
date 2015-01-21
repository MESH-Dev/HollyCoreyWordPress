jQuery(document).ready(function($){
  console.log('ready');

  //homepage scrollable
  $("#slideshow").scrollable({
      circular: true,
      speed: 600,
		  onBeforeSeek: function() {
			  var currSlide = api.getIndex();
			  $('.items > div').each(function() {
				  $(this).removeClass('active');
			  });
		  },
		  onSeek: function() {
			  var currSlide = api.getIndex();
			  currSlide = currSlide + 1;
			  $('.items > div:eq(' + currSlide + ')').addClass('active');
		  }
    }).autoscroll({
      autoplay: true,
      interval: 5000
    });
  var api = $("#slideshow").data("scrollable");
  api.next = function(time) { return this.move(-1, time); };
	$('.items > div:eq(1)').addClass('active');

});
