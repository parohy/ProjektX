$(function(){
    var stars = $(".rating img");
    var rating = $("#numOfRating").text();
    rating = parseInt(rating);
    rating = Math.round(rating);

    stars.css({opacity: 0.5});

    $(".rating").each(function(i){
        if(i == rating) {
            return false;
        } else {
            $(this).children("img").css({opacity: 1});
        }
    });
});
