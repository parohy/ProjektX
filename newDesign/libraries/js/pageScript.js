$(function(){
    $(".product-item.first-row").hover(function(){
        $(this).animate({height:"470px"});
        $(this).next().animate({height:"370px"});
        $(this).child('product-description').append('<a href="#">MORE</a>');
    }, function(){
        $(this).animate({height:"424px"});
        $(this).next().animate({height:"424px"});
        $(this).child('product-description').remove('<a href="#">MORE</a>');
    });

    $(".product-item.second-row").hover(function(){
            $(this).animate({height:"470px"});
            $(this).prev().animate({height:"370px"});
    }, function(){
            $(this).animate({height:"424px"});
            $(this).prev().animate({height:"424px"});
    });
});
