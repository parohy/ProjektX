<?php

/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 8. 12. 2015
 * Time: 11:11
 */
class ImageScaling
{

    private $productItemThumbNailWidth = 278; /* PRODUCT ITEM THUMBNAIL DEFAULT SIZE */
    private $productItemThumbNailHeight = 300; /* PRODUCT ITEM THUMBNAIL DEFAULT SIZE */

    public function productItemTumbnail($productid) { // SCALES PRODUCT IMAGE IN PRODUCT ITEM THUMBNAIL

        $path = 'libraries/img/products/' . $productid . '/' . $productid . 'a.jpg';

        if(file_exists($path)) {
            $oldSize = getimagesize($path);

            $oldW = $oldSize[0];
            $oldH = $oldSize[1];

            if($oldW > $oldH) {
                $finalW = $this->productItemThumbNailWidth;
                $finalH = $oldH * ($this->productItemThumbNailHeight / $oldW);
            }

            if($oldW < $oldH) {
                $finalW = $oldW * ($this->productItemThumbNailWidth/ $oldH);
                $finalH = $this->productItemThumbNailHeight;
            }

            if($oldW == $oldH) {
                $finalW = $this->productItemThumbNailWidth;
                $finalH = $this->productItemThumbNailHeight;
            }

            $size = array(2);
            $size[0] = $finalW;
            $size[1] = $finalH;

            return $size;
        }
        else {
            $size = array(2);
            $size[0] = $this->productItemThumbNailWidth;
            $size[1] = $this->productItemThumbNailHeight;


            return $size;
        }
    }
}