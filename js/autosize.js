  (function($) {
  	$.fn.autosize = function() {
  		$(this).each(function(){
  			$(this).css({'overflow' : 'hidden'});
  			$('body').prepend('<div id="jQuery-autosize-' + $(this).attr('id') + '"></div>');
  			$('#jQuery-autosize-' + $(this).attr('id')).css({
  				'display'      : 'none',
  				'word-wrap'    : 'break-word',
  				'font-family'  : $(this).css('font-family'),
  				'padding'      : $(this).css('padding'),
  				'font-size'    : $(this).css('font-size'),
  				'font-padding' : $(this).css('font-padding'),
  				'font-weight'  : $(this).css('font-weight'),
  				'line-height'  : $(this).css('line-height'),
  				'width'        : $(this).width()
  			});
  			autosize($(this));
  			$(this).bind('keyup keypress change', function() {autosize($(this))});
  		});
  	};

  	function autosize(e) {
  		div_id = '#jQuery-autosize-' + e.attr('id');
  		val = e.val().replace(/\n/g, '<br />');
  		$(div_id).empty();
  		$(div_id).append(val + '<br /><br />');
  		e.css('height', $(div_id).height());
  	}
  })(jQuery);

  $(function(){ $('#auto').autosize(); });