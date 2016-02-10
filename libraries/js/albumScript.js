/**
 * 
 */
$(function(){
    $(".image-album").click(function(){
        var path = $(this).attr("src");

        $("#propic").attr("src",path);
    });;

    $("#propic").click(function(e){
        e.preventDefault();

        var path = $(this).attr("src");

        $("body").append('' +
            '<div class="popupContainer">' +
                '<div class="imageFrame"><img src="' + path + '" class="popupImage"></div>' +
            '</div>'
        );

        var imageWidth = $(".popupImage").width();
        var imageHeight = $(".popupImage").height();
        imageHeight += 50;
        imageWidth += 50;

        $(".popupImage").css({"width":imageWidth+"px","height":imageHeight+"px"});
        $(".popupContainer").click(function(){ $(".popupContainer").remove() });
    });
});