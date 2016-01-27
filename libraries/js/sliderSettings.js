/**
 * Created by Matus on 16. 1. 2016.
 */
$(function(){
    var dropzone = $("#dragNdrop");
    var deleteButton = $(".delete");

    dropzone.ondrop = function(e) {
        e.preventDefault();
    }

    dropzone.ondragover = function() {
        return false;
    }

    dropzone.ondragleave = function() {
        return false;
    }

    function upload() {
    }

    deleteButton.click(function(e){
        e.preventDefault();
        var path = $(this).attr("href");

        $.get("controllers/sliderSettingsController.php?action=deleteFile&path=" + path,function(data,status) {
        });
        return false;
    });
});