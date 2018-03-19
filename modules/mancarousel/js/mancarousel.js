/*! Man Carousel v1.3.1 - @author kik-off.com <info@kik-off.com> */
(function ($) {
	if (!!$.prototype.carouFredSel) {
		var mancarousel = $('#mancarousel');

		if (mancarousel.length > 0) {
			if (typeof (mancarousel_circular) == 'undefined')
				mancarousel_circular = true;
			if (typeof (mancarousel_infinite) == 'undefined')
				mancarousel_infinite = true;
			if (typeof (mancarousel_start) == 'undefined')
				mancarousel_start = true;
			if (typeof (mancarousel_time) == 'undefined')
				mancarousel_time = 6000;
			if (typeof (mancarousel_fx) == 'undefined')
				mancarousel_fx = 'cover-fade';
			if (typeof (mancarousel_fx_time) == 'undefined')
				mancarousel_fx_time = 500;
			if (typeof (mancarousel_mouseover_pause) == 'undefined')
				mancarousel_mouseover_pause = true;
			if (typeof (mancarousel_image_size) == 'undefined')
				mancarousel_image_size = {
					"width": "98",
					"height": "98"
				};

			mancarousel.carouFredSel({
				onWindowResize: 'throttle',
				circular: mancarousel_circular,
				infinite: true,
				align: 'center',
				width: '100%',
				auto: {
					play: mancarousel_start,
					timeoutDuration: mancarousel_time
				},
				items: {
					visible: null,
					start: 'random',
					width: mancarousel_image_size.width + 'px',
					height: mancarousel_image_size.height + 'px'
				},
				scroll: {
					fx: mancarousel_fx,
					duration: mancarousel_fx_time,
					pauseOnHover: mancarousel_mouseover_pause
				},
				prev: {
					button: '#mancarousel_prev',
					key: 'left'
				},
				next: {
					button: '#mancarousel_next',
					key: 'right'
				}
			}, {
				wrapper: {
					element: 'div',
					classname: 'mancarousel_wrapper'
				},
				classnames: {
					selected: 'selected',
					hidden: 'hidden',
					disabled: 'disabled',
					paused: 'paused',
					stopped: 'stopped'
				}
			});
		}
	}
})(jQuery);