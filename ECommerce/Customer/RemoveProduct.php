<?php session_start();?>

<html>

<body>

<head>
<title>Remove Product</title>
</head>

<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-commerce";

$conn = mysqli_connect($servername, $username, $password , $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$data=$_POST["dropDownProduct"];
$data=unserialize($data);

$productID=$data[0];
$transID=$data[1];
$productName=$data[2];


$s= "SELECT Quantity FROM orderprocessing WHERE TransactionID='$transID'";
$result=mysqli_query($conn, $s);
$tmp=mysqli_fetch_assoc($result);
$orderQuantity=$tmp["Quantity"];


$s= "DELETE FROM `orderprocessing` WHERE TransactionID='$transID'";
if (mysqli_query($conn , $s) )
{
	$msg= "'$productName' is successfully removed from your cart";
	
	$s= "SELECT QuantityInStock FROM product WHERE ProductID='$productID'";
	$result=mysqli_query($conn,$s);
	$tmp=mysqli_fetch_assoc($result);
	$addQuantity=$tmp["QuantityInStock"]+$orderQuantity;
	if($addQuantity==0)$vis=0;
	else $vis=1;
	$s="UPDATE product SET QuantityInStock='$addQuantity', Visible='$vis' WHERE ProductID='$productID'";
	if(!mysqli_query($conn, $s))$msg= "Failed";
}
else
{$msg= "Failed!";}

$_SESSION["MSG"]=$msg;

Header('Location:ShoppingCartPage.php');
?>

</body>

</html>