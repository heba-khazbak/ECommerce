<html>
<body>

<head>
    <title>ZLASH - (Admin)Update product</title>    
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
            <br><h2>Update Products</h2>
            
<?php
//if (isset($_GET['ProductID']))
$ID = $_GET['ProductID'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-commerce";

// Create connection
$conn = mysqli_connect($servername, $username, $password , $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$s = "SELECT * FROM product where ProductID = $ID ";

$result = mysqli_query($conn , $s);

while($x = mysqli_fetch_array($result)) {
	$Name = $x['Name'];
	$Description = $x['Description'];
	$QuantityInStock = $x['QuantityInStock'];
	$Price = $x['Price'];
	$Category = $x['Category'];
	$subCategory = $x['subCategory'];
	$Visible =$x['Visible'];
	$Picture =$x['Picture'];
}

?>

<form name = "updateForm" action="update.php" method = "post" onsubmit="return isValid()" class="editForm">
Name: <input type = "text" name = "name" value = '<?php echo  $Name ; ?> ' id="name"> <br>
Description: <input type = "text" name = "description" value = '<?php echo  $Description ; ?> ' id="des" > <br>
Quantity in stock: <input type = "text" id="Qs" name = "quantity" value = '<?php echo  $QuantityInStock ; ?> ' > <br>
Price: <input type = "text" id="price" name = "price" value = '<?php echo  $Price ; ?> ' > <br>
Category: <input type = "text" id="category" name = "category" value = '<?php echo  $Category ; ?> ' > <br>
SubCategory: <input type = "text" id="sub" name = "subCategory" value = '<?php echo  $subCategory ; ?> ' > <br>
<input type = "hidden" name = "ProductID" id="ID" value = '<?php echo  $ID ; ?> '> <br>
<input type = "submit" name = "submit" value = "Update" class="Button">
</form>



<script>
        
        function isValid()
            {
                var Name = document.forms["updateForm"]["name"].value;
                var Desc = document.forms["updateForm"]["description"].value;
                var Quantity = document.forms["updateForm"]["quantity"].value;
                var Price = document.forms["updateForm"]["price"].value;
                var Category = document.forms["updateForm"]["category"].value;
                var SubCategory = document.forms["updateForm"]["subCategory"].value;

              //  alert("Hii " + Name);
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