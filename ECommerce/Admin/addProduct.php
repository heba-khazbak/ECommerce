<html>
<body>

<head>
    <title>ZLASH - (Admin)Add product</title>    
    <link rel="stylesheet" href="css/Main.css" type="text/css"/>
    <link rel="stylesheet" href="css/editProduct.css" type="text/css"/>
</head>
    
    <body>
        
        <div class="Header">
        <a href="HomePage.php">
        <img src="css/Logo.png" alt="Logo" style="width:633; height:181px" >
        </a>
        </div>
    
        
        <div class="cont">



<form name = "addProductForm" action="add.php" method = "post" onsubmit="return isValid()" class="editForm">
Name: <input type = "text" name = "name" id="name"> <br>
Description: <input type = "text" name = "description" id="des"> <br>
Quantity in stock: <input type = "text" name = "quantity" id="Qs"> <br>
Price: <input type = "text" name = "price" id="price"> <br>
Category: <input type = "text" name = "category"  id="category"> <br>
SubCategory: <input type = "text" name = "subCategory"  id="sub"> <br>
Picture: <input type = "text" name = "picture" id="pic"> <br>
<input type = "hidden" name = "ProductID"  id="ID"> <br>
<input type = "submit" name = "submit" value = "Add" class="Button">
</form>



<script>
        
        function isValid()
            {
                var Name = document.forms["addProductForm"]["name"].value;
                var Desc = document.forms["addProductForm"]["description"].value;
                var Quantity = document.forms["addProductForm"]["quantity"].value;
                var Price = document.forms["addProductForm"]["price"].value;
                var Category = document.forms["addProductForm"]["category"].value;
                var SubCategory = document.forms["addProductForm"]["subCategory"].value;

              	var flag = true;

                if (isNaN(Price) || Price == "")
                {
                	alert("Please Enter a Valid Price" );
                	flag = false;
                }

                if (Quantity != parseInt(Quantity, 10) || Quantity == "")
                {
                	alert("Please Enter a Valid Quantity" );
                	flag = false;
                }
                
                if (SubCategory == "" || Category == "" || Desc == "" || Name == "" )
                {
                	alert("Fields can't be Empty!" );
                	flag = false;
                }
                	
                return flag;

                    
            }
            
        </script>


</div>
</body>
</html>
