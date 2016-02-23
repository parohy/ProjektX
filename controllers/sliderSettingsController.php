<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 27. 1. 2016
 * Time: 18:36
 */
session_start();

$absolutePath = $_SERVER['DOCUMENT_ROOT'];
$absolutePath .= "ProjektX/";

$allowedExtensions = array("jpeg","jpg","JPG","png");
$isEmpty = empty($_FILES['files']['name'][0]);
$maxWidth = 1500;
$maxHeight = 500;

// DELETE FILE
if(isset($_GET['path']) && isset($_GET['name'])) {
    $dirPath = $_GET['path'];
    $dirPath = "../".$dirPath;
    $name = $_GET['name'];

    chdir($dirPath);

    $filePath = getcwd(). '\\' .$name;

    if(file_exists($filePath)) {
        unlink($filePath);
    }
    else {
        $_SESSION['uploadErr'] = "Cannot delete file";
    }

    header("Location:../?page=private/pageSettings&settings=sliderSettings");
    exit();
}

// UPLOAD FILE
if($isEmpty === false) {
    $targetDirectory = $absolutePath."libraries/img/slider/slides/";
    $files = $_FILES['files'];

    // GET DIMENSIONS OF IMAGE IN PIXELS
    $fileDimensions = getimagesize($files['tmp_name'][0]);
    $image_width = $fileDimensions[0];
    $image_height = $fileDimensions[1];

    if($image_width > $maxWidth || $image_height > $maxHeight) {
        $_SESSION['uploadErr'] = "Wrong image size";
    }
    else {
        if(file_exists($targetDirectory.$files['name'][0])) {
            $_SESSION['uploadErr'] = "File already exists";
        }
        else {
            $fileExtension = explode('.',$files['name'][0]);
            $fileExtension = strtolower(end($fileExtension));

            if(in_array($fileExtension,$allowedExtensions)) {
                $targetFile = $targetDirectory . $files['name'][0];

                if(move_uploaded_file($files['tmp_name'][0],$targetFile)) {
                    header("Location:../?page=private/pageSettings&settings=sliderSettings");
                    exit();
                }
                else {
                    $_SESSION['uploadErr'] = "Failed to move file";
                }
            }
            else {
                $_SESSION['uploadErr'] = "Wrong filename extension";
            }
        }
    }
    header("Location:../?page=private/pageSettings&settings=sliderSettings");
    exit();
}
else {
    $_SESSION['uploadErr'] = "Something went wrong";
    header("Location:../?page=private/pageSettings&settings=sliderSettings");
    exit();
}

