
<!doctype html>
<html lang="">
<head>

<style>




    .tabs input[type=radio] {
        position: absolute;
       display: none;
    }
    .tabs {
        width: 650px;
        float: none;
        list-style: none;
        position: relative;
        padding: 0;

    }
     .tabs li{
        float: left;
    }
    .tabs label {
        display: block;
        padding: 10px 20px;
        border-radius: 2px 2px 0 0;
        color: black;
        font-size: 18px;
        font-weight: normal;
        font-family: 'Lily Script One', helveti;
        background: rgba(255,255,255,0.2);
        cursor: pointer;
        position: relative;
        top: 3px;
        -webkit-transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
    }
    .tabs label:hover {
        background: rgba(255,255,255,0.5);
        top: 0;
    }

    [id^=tab]:checked + label {
        background: #8A8686;
        color: black
    ;
        top: 0;
    }

    [id^=tab]:checked ~ [id^=tab-content] {
        display: block;
    }
    .tab-content{
        z-index: 2;
        display: none;
        text-align: left;
        width: 100%;
        height: 450px;
        font-size: 20px;
        line-height: 140%;
        padding-top: 10px;
        background: #8A8686;
        margin-top: 20PX;
        padding: 15px;
        color: black;
        position: absolute;
        top: 53px;
        left: 0;
        box-sizing: border-box;
        -webkit-animation-duration: 0.5s;
        -o-animation-duration: 0.5s;
        -moz-animation-duration: 0.5s;
        animation-duration: 0.5s;
    }






 </style>

</head>




<body>
<div id="main">
<ul class="tabs">
    <li>
        <input type="radio" checked name="tabs" id="tab1">
        <label for="tab1">Insert item</label>
        <div id="tab-content1" class="tab-content animated fadeIn">
            <form name="insert-item" action="" method="get">
                <table>

                        <tr>

                            <td> <span class="input-name">Product Id:</span> </td> <td><input class="input" type="text" name="productid" id="productid" size="20"></td>

                        </tr>

                        <tr>

                            <td> <span class="input-name">Category</td>
                            <td> <select name="category" id="categoryid">
                                    <option type="text" name="electronic" id="1">Electronics</option>
                                    <option type="text" name="mobile" id="2">Mobiles</option>
                                    <option type="text" name="small device" id="3">Small device</option>
                                    <option type="text" name="PC" id="4">Nootebok & PC</option>

                                </select>
                            </td>

                        </tr>


                        <td><span class="input-name">Amount </td> <td><input class="input" type="text" name="amount" id="amount" size="20"> </td>
                        </tr>

                        <tr>
                            <td><span class="input-name">Name </td> <td> <textarea class="input" type="text" name="name" id="name" size="200"></textarea></td>
                        </tr>

                        <tr>
                            <td><span class="input-name">Price </td>  <td><input class="input" type="text" name="price" id="price" size="20"></td>
                        </tr>

                        <tr>
                            <td><span class="input-name">Brand </td>  <td><input class="input" type="text" name="brand" id="brand" size="20"></td>
                        </tr>

                        <tr>
                            <td><span class="input-name"> Description</td> <td> <textarea class="input" rows="5" cols="20" name="descriptoin" id="description" size="20">
                    </textarea></td>
                        </tr>

                        <tr>
                            <td><span class="input-name">Picture </td> <td><input class="input" type="file" name="imagepath" id="imagepath"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="sent" id="sent" value="insert"><td>
                        </tr>
                </table>
            </form>
        </div>

    </li>
    <li>
        <input type="radio" name="tabs" id="tab2">
        <label for="tab2">Delete item</label>
        <div id="tab-content2" class="tab-content animated fadeIn">

               <form id="delete-product" action="/edit" method="get">
                    <table>
                        <tr>

                            <td> <span class="input-name">Category</td>
                            <td> <select name="category" id="categoryid">
                                    <option type="text" name="electronic" id="1">Electronics</option>
                                    <option type="text" name="mobile" id="2">Mobiles</option>
                                    <option type="text" name="small device" id="3">Small device</option>
                                    <option type="text" name="PC" id="4">Nootebok & PC</option>

                                </select>
                            </td>

                        </tr>

                        <tr>
                            <td>Product-id</td><td><input class="input" type="text" name="productid" id="productid" size="20"></td>
                        </tr>

                        <tr>
                            <td><input type="submit" name="sent" id="sent" value="delete"><td>
                        </tr>
                    </table>
               </form>
        </div>
    </li>


    <li>
        <input type="radio" name="tabs" id="tab3">
        <label for="tab3">Change video</label>
        <div id="tab-content3" class="tab-content animated fadeIn">

                <form id="delete-product" action="/edit" method="get">
                    <table>
                        <tr>
                            <td><span class="input-name">Video </td> <td><input class="input" type="file" name="videopath" id="videopath"></td>
                        </tr>
                        <tr>
                            <td> <input type="submit" name="sent" id="sent" value="change"> </td>
                        </tr>
                    </table>
                </form>

        </div>
    </li>
	


	   <li>
        <input type="radio" name="tabs" id="tab4">
        <label for="tab4">Change Welcome<br>messaage</label>
        <div id="tab-content4" class="tab-content animated fadeIn">
            <form id="delete-product" action="/edit" method="get">
                <table>
                    <tr>
                        <td><span class="input-name">Welcome message </td>
                    </tr>

                    <tr>
                     <td><input class="input" type="text" name="Wmessage" id="Wmessage"></td>
                    </tr>

                    <tr>
                        <td> <input type="submit" name="sent" id="sent" value="change"> </td>
                    </tr>
                </table>
            </form>

        </div>
   
</ul>

</div>
</body>

</html>