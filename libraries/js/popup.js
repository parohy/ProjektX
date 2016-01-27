/**
 * Created by Matus on 27. 1. 2016.
 */
function popup(title,body, width, height) {
    $("body").append('<div class="popupContainer"><div class="popupFrame">' +
            '<div class="popupTitle">' + title + ' <a href="#" id="closePopup">X</a></div>' +
            '<div class="popupBody">' + body + '</div>' +
        '</div></div>');

    $(".popupFrame").css({"width":width+"px","height":height+"px"});

    $("#closePopup").click(function(e) {
        e.preventDefault();
        $(".popupContainer").remove();
        return false;
    });
}