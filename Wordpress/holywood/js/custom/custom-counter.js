(function($) {
  "use strict";

  $(document).ready(function (){
    'use strict';


 // Countdown
    // To change date, simply edit: var endDate = "January 1, 2016 00:00:00";
    $(function() {
      var endDate = "January 1, 2019 00:00:00";
      $('.lj-countdown .row').countdown({
        date: endDate,
        render: function(data) {
          $(this.el).html('<div><div><span>' + (parseInt(this.leadingZeros(data.years, 2)*365) + parseInt(this.leadingZeros(data.days, 2))) + '</span><span>days</span></div><div><span>' + this.leadingZeros(data.hours, 2) + '</span><span>hours</span></div></div><div class="lj-countdown-ms"><div><span>' + this.leadingZeros(data.min, 2) + '</span><span>minutes</span></div><div><span>' + this.leadingZeros(data.sec, 2) + '</span><span>seconds</span></div></div>');
        }
      });
    });
    });
	
	})(jQuery);


