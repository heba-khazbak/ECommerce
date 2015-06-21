<?php session_start(); ?>

<html>
<body>

<body>

<head>
<title>ZLASH - editing Shopping Cart</title>    
<link rel="stylesheet" href="css/Main.css" type="text/css"/> 
<link rel="stylesheet" href="css/Forms.css" type="text/css"/>
</head>
    
    <body>
        
        <div class="Header">
        <a href="HomePage.php">
        <img src="css/Logo.png" alt="Logo" style="width:633; height:181px" >
        </a>
        </div>
    
        <div class="Header1">
        <p >editing Shopping Cart</p>
        </div>

        <div class="cont">

<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-commerce";

$conn = mysqli_connect($servername, $username, $password , $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}




$customerID=$_SESSION["CustomerID"];


$s = "SELECT * FROM orderprocessing WHERE CustomerID='$customerID'";
$result = mysqli_query($conn , $s);


?>


<form method="post" name="editForm" class="editForm">
<?php 

$check=false;

echo "<select name='dropDownProduct'>";

while($x = mysqli_fetch_array($result)) {
	
if($x["Processed"]==1)continue;

$check=true;

$proID=$x["ProductID"];
$transID=$x["TransactionID"];

$s= "SELECT `Name` FROM `product` WHERE `ProductID`= '$proID'";
$tmp=mysqli_query($conn,$s);

$tmp=mysqli_fetch_assoc($tmp);
$name=$tmp["Name"];

$data= array($proID,$transID,$name);
$data=serialize($data);

echo "<option value='$data'>$name</option>";

}
echo "</select>";
echo "<br>";
        		
if($check==false){
	$_SESSION["MSG"]="You don't have any products in your cart!";
	Header('Location:ShoppingCartPage.php');
}
        		
?>
    
<br>
<input type="submit" value="Remove Product" name="remove" id="Button" class="Button" onclick="javascript: editForm.action='RemoveProduct.php';">
<input type="submit" value="Edit Product Quantity" name="edit" id="Button" class="Button" onclick="javascript: editForm.action='EditProductQuantity.php';">
</form>



   </div>
        
    <div class="Footer"><a href = "homepage.php"> ZLASH.com </a></div>
    </body>
</html>

