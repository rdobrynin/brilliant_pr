(function ($) {
    Drupal.behaviors.time = {
        attach : function(context, settings) {
            function pretty_time_string(num) {
                return ( num < 10 ? "0" : "" ) + num;
            }
            var start = new Date;
            setInterval(function() {
                var d = new Date();
                var weekday = new Array(7);
                weekday[0]=  "Sunday";
                weekday[1] = "Monday";
                weekday[2] = "Tuesday";
                weekday[3] = "Wednesday";
                weekday[4] = "Thursday";
                weekday[5] = "Friday";
                weekday[6] = "Saturday";
                var month = new Array();
                month[0] = "January";
                month[1] = "February";
                month[2] = "March";
                month[3] = "April";
                month[4] = "May";
                month[5] = "June";
                month[6] = "July";
                month[7] = "August";
                month[8] = "September";
                month[9] = "October";
                month[10] = "November";
                month[11] = "December";
                var time_date = d.getDate() +  " " + month[d.getMonth()] + " " + weekday[d.getDay()] + " ";
                var time_time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
// counter
                var total_seconds = (new Date - start) / 1000;
                var hours = Math.floor(total_seconds / 3600);
                total_seconds = total_seconds % 3600;
                var minutes = Math.floor(total_seconds / 60);
                total_seconds = total_seconds % 60;
                var seconds = Math.floor(total_seconds);
                hours = pretty_time_string(hours);
                minutes = pretty_time_string(minutes);
                seconds = pretty_time_string(seconds);
                var currentTimeString = hours + ":" + minutes + ":" + seconds;
//        end counter
                $('.time-top').text(time_date + time_time);

            }, 100);
        }
    };
    Drupal.behaviors.modal = {
        attach : function(context, settings) {
            $('#edit-remove').click(function(){
                $('#myModal').modal('show');

            });
        }
    };

    Drupal.behaviors.modal = {
        attach : function(context, settings) {
            $("#back-top").hide();

            $(function () {
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 100) {
                        $('#back-top').fadeIn();
                    } else {
                        $('#back-top').fadeOut();
                    }
                });

                $('#back-top a').click(function () {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 800);
                    return false;
                });
            });
        }
    };
})(jQuery);