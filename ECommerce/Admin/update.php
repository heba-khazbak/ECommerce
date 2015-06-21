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
            <br><h2>Update Product Status</h2>


<?php
$ID = $_POST['ProductID'];

$Name = $_POST["name"];
$Desc = $_POST["description"];
$Quantity = $_POST["quantity"];
$Price = $_POST["price"];
$Category = $_POST["category"];
$SubCategory = $_POST["subCategory"];


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

$s = "UPDATE product SET Name='$Name',Description='$Desc',QuantityInStock=$Quantity,
Price=$Price,Category='$Category',subCategory='$SubCategory' WHERE ProductID = $ID ";


if (mysqli_query($conn , $s) )
{
	echo " Successfully Updated<br>";
}
else
	echo "Failed!";

?>
            
<br><a href="HomePage.php" class="Links">Return to Home Page</a>
            
</div>
</body>
</html>