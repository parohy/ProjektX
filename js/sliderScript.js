/**
 * Created by PHPStorm
 * User: Matus Kacmar
 * Date: 18. 11. 2015
 * Time: 19:51
 */

$(function(){
    var leftArrow = $("#leftArrow");
    var rightArrow = $("#rightArrow");
    var margin = -260;
    var i = 0;

    var interval = setInterval(function(){
        slide();
    },5000);

    leftArrow.click(function() {
        clearInterval(interval);
        if(margin == 0) {
            margin = -780;
        } else {
            margin += 260;
        }

        $(".slide").eq(0).animate({marginTop: margin + "px"});

        interval = setInterval(function(){ slide(); },5000);
    });

    rightArrow.click(function() {

        clearInterval(interval);

        if(margin == -780) {
            margin = 0;
        } else {
            margin -= 260;
        }

        $(".slide").eq(0).animate({marginTop: margin + "px"});

        interval = setInterval(function(){ slide(); },5000);
    });

    function slide() {
      $(".slide").eq(0).animate({marginTop: margin + "px"});
      if(margin <= -780) {
          margin = 0;
      } else {
          margin -= 260;
      }
    }
});
