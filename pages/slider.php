<div class="slider">
    <script type="text/javascript">
        <!-->
        var image1=new Image()
        image1.src="img/slider/slide1.jpg"
        var image2=new Image()
        image2.src="img/slider/slide2.jpg"
        var image3=new Image()
        image3.src="img/slider/slide3.jpg"
        //-->
    </script>

    <img src="slide1.jpg" name="slide" width="50%" height="100%">
    <script type="text/javascript">
        <!--
        var step=1
        function slideit(){
            document.images.slide.src=eval("image"+step+".src");
            if(step<3)
                step++;
            else
                step=1;
            setTimeout("slideit()",4000);
        }
        slideit();
        //-->
    </script>
</div>