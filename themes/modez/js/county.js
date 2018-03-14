!function($){
	"use strict";

	var County = function(arg, options){
		this.init(arg, options);
	};

	County.prototype = {
		constructor: County,

		init: function(arg, options){
			this.settings = $.extend({ endDateTime: new Date(), animation: 'fade', reflection: false, reflectionOpacity: 0.2, speed: 500, theme: 'black' }, options);
			this.timeoutInterval = null;
			this.container = $(arg);

			this.createViews();
		},

		createViews: function() {
			var self = this;
			if (!this.container.hasClass('county')) {
				this.container.addClass('county ' + this.settings.theme);
	            this.container.append('<span class="county-days-wrapper first"><span class="county-days">000</span></span><span class="county-hours-wrapper separator-left border-separator-right"><span class="county-hours">00</span></span><span class="county-minutes-wrapper separator-left separator-left"><span class="county-minutes">00</span></span><span class="county-seconds-wrapper separator-left last"><span class="county-seconds">00</span></span><div class="titles"><span class="county-label-days">' + this.settings.titleDays + '</span><span class="county-label-hours">' + this.settings.titleHours + '</span><span class="county-label-minutes">' + this.settings.titleMinutes + '</span><span class="county-label-seconds">' + this.settings.titleSeconds + '</span></div>');
            }
            if (this.container.attr('id') == undefined || this.container.attr('id') == null) {
                this.container.attr('id', Math.random());
            }
            var w = 0;
            this.container.find('>span').each(function () {
                if ($(this).hasClass('county-days-wrapper') ||
                $(this).hasClass('county-hours-wrapper') ||
                $(this).hasClass('county-minutes-wrapper') ||
                $(this).hasClass('county-seconds-wrapper'))
                    w += $(this).outerWidth();
            });

            this.container.css({ width: w });

            this.container.find('>span>span').each(function () {

                $(this).css({ position: 'absolute', width: $(this).width(), height: $(this).height() });
                $(this).parent().css({ width: $(this).width() });
                var daysLabel = self.container.find('.county-label-days');
                var hoursLabel = self.container.find('.county-label-hours');
                var minutesLabel = self.container.find('.county-label-minutes');
                var secondsLabel = self.container.find('.county-label-seconds');
                if ($(this).hasClass('county-days')) {
                    daysLabel.css({ width: $(this).parent().outerWidth() });
                }
                if ($(this).hasClass('county-hours')) {
                    hoursLabel.css({ width: $(this).parent().outerWidth() });
                }
                if ($(this).hasClass('county-minutes')) {
                    minutesLabel.css({ width: $(this).parent().outerWidth() });
                }
                if ($(this).hasClass('county-seconds')) {
                    secondsLabel.css({ width: $(this).parent().outerWidth() });
                }
            });

            this.reflectionContainer = this.container.clone().css({ opacity: this.settings.reflectionOpacity }).attr('id', this.container.attr('id') + '-refl').addClass('county-reflection');
            if (this.settings.reflection)
                this.container.after(this.reflectionContainer);

            this.updateCounter();
		},

		getCountDown: function() {
			var self = this;
			clearTimeout(this.timeoutInterval);
            this.timeoutInterval = setTimeout(function () {

                self.updateCounter();

            }, 1000);
		},

		updateCounter: function() {
			var countDown = this.getCurrentCountDown();
            var days = this.container.find('.county-days');
            var hours = this.container.find('.county-hours');
            var minutes = this.container.find('.county-minutes');
            var seconds = this.container.find('.county-seconds');

            var dayVal = days.html();
            var hourVal = hours.html();
            var minuteVal = minutes.html();
            var secondVal = seconds.html();

            if (dayVal == countDown.days) {
                days.html(countDown.days);
            }
            else {
                if (this.settings.reflection)
                    this.aimateObject(days, this.reflectionContainer.find('.county-days'), dayVal, countDown.days, this.settings.animation);
                else
                    this.aimateObject(days, null, dayVal, countDown.days, this.settings.animation);
            }

            if (hourVal == countDown.hours)
                hours.html(countDown.hours);
            else {
                if (this.settings.reflection)
                    this.aimateObject(hours, this.reflectionContainer.find('.county-hours'), hourVal, countDown.hours, this.settings.animation);
                else
                    this.aimateObject(hours, null, hourVal, countDown.hours, this.settings.animation);
            }

            if (minuteVal == countDown.minutes)
                minutes.html(countDown.minutes);
            else {
                if (this.settings.reflection)
                    this.aimateObject(minutes, this.reflectionContainer.find('.county-minutes'), minuteVal, countDown.minutes, this.settings.animation);
                else
                    this.aimateObject(minutes, null, minuteVal, countDown.minutes, this.settings.animation);
            }
            if (secondVal == countDown.seconds)
                seconds.html(countDown.seconds);
            else {
                if (this.settings.reflection)
                    this.aimateObject(seconds, this.reflectionContainer.find('.county-seconds'), secondVal, countDown.seconds, this.settings.animation);
                else
                    this.aimateObject(seconds, null, secondVal, countDown.seconds, this.settings.animation);
            }

            this.getCountDown();
		},

		aimateObject: function(element, reflectionElement, oldValue, newValue, type) {

		if (type == 'fade') {
                element.fadeOut('fast').fadeIn('fast').html(newValue);
                if (this.settings.reflection)
                    this.reflectionElement.fadeOut('fast').fadeIn('fast').html(newValue);
            }
            else if (type == 'none') {
                element.html(newValue);
            }
            else if (type == 'scroll') {
                var copy = element.clone();
                var reflectionCopy = null;

                if (this.settings.reflection)
                    reflectionCopy = reflectionElement.clone();

                var marginTop = copy.outerHeight();

                copy.css({ marginTop: -marginTop });
                copy.html(newValue);
                copy.prependTo(element.parent());

                if (this.settings.reflection) {
                    reflectionCopy.css({ marginTop: -marginTop });
                    reflectionCopy.html(newValue);
                    reflectionCopy.prependTo(this.reflectionElement.parent());
                }

                element.animate({ marginTop: "22px", opacity: 0 }, this.settings.speed, function () { $(this).remove(); });
                copy.animate({ marginTop: 0 }, this.settings.speed, function () { });

                if (this.settings.reflection) {
                    this.reflectionElement.animate({ marginTop: marginTop }, this.settings.speed, function () { $(this).remove(); });
                    reflectionCopy.animate({ marginTop: 0 }, this.settings.speed, function () { });
                }

            }
		},

		getCurrentCountDown: function() {
			var currentDateTime = new Date();

            var diff = parseFloat(this.settings.endDateTime - currentDateTime);
			var self = this;

            var seconds = 0;
            var minutes = 0;
            var hours = 0;
            var total = parseFloat(((((diff / 1000.0) / 60.0) / 60.0) / 24.0));

            var days = parseInt(total);

            total -= days;

            total *= 24.0;

            hours = parseInt(total);

            total -= hours;

            total *= 60.0;

            minutes = parseInt(total);

            total -= minutes;

            total *= 60;

            seconds = parseInt(total);

            return { days: self.formatNumber(Math.max(0, days), true), hours: self.formatNumber(Math.max(0, hours), false), minutes: self.formatNumber(Math.max(0, minutes), false), seconds: self.formatNumber(Math.max(0, seconds), false) };

		},

		formatNumber: function(number, isday) {
			var strNumber = number.toString();
            if (!isday) {
                if (strNumber.length == 1)
                    return '0' + strNumber;
                else
                    return strNumber;
            }
            else {
                if (strNumber.length == 1)
                    return strNumber;
                else if (strNumber == 2)
                    return strNumber;
                else
                    return strNumber;
            }
		},

		getHunderth: function(number) {
			var strNumber = '' + number;

            if (strNumber.length == 3)
                return strNumber.substr(0, 1);
            else
                return '0';
		},

		getTenth: function(number) {
			var strNumber = '' + number;

            if (strNumber.length == 2)
                return strNumber.substr(0, 1);
            else
                return '0';
		},

		getUnit: function(number) {
            var strNumber = '' + number;

            if (strNumber.length >= 1)
                return strNumber.substr(0, 1);
            else
                return '0';
		}
	}

	$.fn.county = function (option, params) {
        var $this = $(this);
        var data = $this.data('list');
        if (!data) {$this.data('list', (data = new County(this, option)));}
        if (typeof option === 'string'){ return data[option](params);}
	};

	$.fn.county.Constructor = County;

}(window.jQuery);