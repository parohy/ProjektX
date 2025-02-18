<?php

/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 8. 12. 2015
 * Time: 11:11
 */
class ImageScaling
{

    private $productItemThumbNailWidth = 278; /* PRODUCT ITEM THUMBNAIL DEFAULT SIZE */
    private $productItemThumbNailHeight = 300; /* PRODUCT ITEM THUMBNAIL DEFAULT SIZE */
    private $productPreviewImageWidth = 400;
    private $productPreviewImageHeight = 350;

    public function productItemTumbnail($productid)
    { // SCALES PRODUCT IMAGE IN PRODUCT ITEM THUMBNAIL

        $path = 'libraries/img/products/' . $productid . '/' . $productid . 'a.jpg';

        if (file_exists($path)) {
            $oldSize = getimagesize($path);

            $oldW = $oldSize[0];
            $oldH = $oldSize[1];

            if ($oldW > $oldH) {
                $finalW = $this->productItemThumbNailWidth;
                $finalH = $oldH * ($this->productItemThumbNailHeight / $oldW);
            }

            if ($oldW < $oldH) {
                $finalW = $oldW * ($this->productItemThumbNailWidth / $oldH);
                $finalH = $this->productItemThumbNailHeight;
            }

            if ($oldW == $oldH) {
                $finalW = $this->productItemThumbNailWidth;
                $finalH = $this->productItemThumbNailHeight;
            }

            $size = array(2);
            $size[0] = $finalW;
            $size[1] = $finalH;

            return $size;
        } else {
            $size = array(2);
            $size[0] = $this->productItemThumbNailWidth;
            $size[1] = $this->productItemThumbNailHeight;


            return $size;
        }
    }

    public function productItemTumbnailMargin($size)
    { // CALCULATE MARGIN OF PRODUCT ITEM TUMBNAIL IMAGE
        $margin = array(2);
        $margin[0] = ($this->productItemThumbNailWidth - $size[0]) / 2;
        $margin[1] = ($this->productItemThumbNailHeight - $size[1]) / 2;

        return $margin;
    }

    public function productPreviewImage($productid)
    {
        $path = 'libraries/img/products/' . $productid . '/' . $productid . 'a.jpg';

        if (file_exists($path)) {
            $oldSize = getimagesize($path);

            $oldW = $oldSize[0];
            $oldH = $oldSize[1];

            if ($oldW > $oldH) {
                $finalW = $this->productPreviewImageWidth;
                $finalH = $oldH * ($this->productPreviewImageHeight / $oldW);
            }

            if ($oldW < $oldH) {
                $finalW = $oldW * ($this->productPreviewImageWidth / $oldH);
                $finalH = $this->productPreviewImageHeight;
            }

            if ($oldW == $oldH) {
                $finalW = $this->productPreviewImageWidth;
                $finalH = $this->productPreviewImageHeight;
            }

            $size = array(2);
            $size[0] = $finalW;
            $size[1] = $finalH;

            return $size;
        } else {
            $size = array(2);
            $size[0] = $this->productPreviewImageWidth;
            $size[1] = $this->productPreviewImageHeight;


            return $size;
        }
    }
    
    public function productPreviewImageIndex($productid, $index)
    {	
    	$imgName = $productid . $index . '.jpg';
    	$path = 'libraries/img/products/' . $productid . '/' . $imgName;
    
    	if (file_exists($path)) {
    		$oldSize = getimagesize($path);
    
    		$oldW = $oldSize[0];
    		$oldH = $oldSize[1];
    
    		if ($oldW > $oldH) {
    			$finalW = $this->productPreviewImageWidth;
    			$finalH = $oldH * ($this->productPreviewImageHeight / $oldW);
    		}
    
    		if ($oldW < $oldH) {
    			$finalW = $oldW * ($this->productPreviewImageWidth / $oldH);
    			$finalH = $this->productPreviewImageHeight;
    		}
    
    		if ($oldW == $oldH) {
    			$finalW = $this->productPreviewImageWidth;
    			$finalH = $this->productPreviewImageHeight;
    		}
    
    		$size = array(2);
    		$size[0] = $finalW;
    		$size[1] = $finalH;
    
    		return $size;
    	} else {
    		$size = array(2);
    		$size[0] = $this->productPreviewImageWidth;
    		$size[1] = $this->productPreviewImageHeight;
    
    
    		return $size;
    	}
    }
}