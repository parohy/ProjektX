

<!doctype html>
<html>

<head>
<meta charset="UTF-8">
    <title>product-item</title>
    <style>
        #product-item{
            margin-top: 20px;
            margin-left: 20px;
        }

        #table{
            background-color: rgba(94, 99, 97, 0.23);
        }
       .input-name{
        font-weight: bold;
        }
        


    </style>
</head>

<body>

    <div id="product-item">
        <table id="table">
            <form name="pruduct-item-formular" action="" method="get">


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
                  <td><input type="submit" name="sent" id="sent"><td>
                </tr>

             </form>

        </table>


    </div>







</body>

</html>


