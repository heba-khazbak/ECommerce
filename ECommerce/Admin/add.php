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
            <br>

<?php
$ID = $_POST['ProductID'];

$Name = $_POST["name"];
$Desc = $_POST["description"];
$Quantity = $_POST["quantity"];
$Price = $_POST["price"];
$Category = $_POST["category"];
$SubCategory = $_POST["subCategory"];
$Picture= $_POST["picture"];

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

$s ="INSERT INTO product(Name, Description, QuantityInStock, Price, Category, subCategory, Picture) 
VALUES ('$Name','$Desc','$Quantity','$Price','$Category','$SubCategory','$Picture') ";



if (mysqli_query($conn , $s) )
{
	echo " <p class='text'>Successfully added</p><br>";
}
else
	echo "Failed!";

?>
       
<a href="HomePage.php" class="Links">Return to Home Page</a>
            
</div>
</body>
</html>