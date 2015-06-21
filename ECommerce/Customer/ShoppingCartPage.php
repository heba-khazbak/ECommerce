<?php session_start();?>

<html>
<body>

<body>

<head>
<title>ZLASH - Shopping Cart</title>    
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
        <p >Shopping Cart Page</p>
        </div>

        <div class="cont">


<?php

if (isset($_SESSION['MSG'])){
	$msg=$_SESSION["MSG"];
	echo "<p class='text'>$msg<p>";
	unset($_SESSION['MSG']);
}

$customerID=$_SESSION["CustomerID"];
$curTime=date('Y-m-d G:i:s');



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-commerce";

$conn = mysqli_connect($servername, $username, $password , $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}


$s= "SELECT * FROM orderprocessing";
$result=mysqli_query($conn,$s);
while($x = mysqli_fetch_array($result)){
	if($x['Processed']!=0 || $x['Shipped']!=0)continue;
	$time = strtotime($x["DateBought"]);
	$current=time();
	if($current-$time<1800)continue;
	
	$transID=$x['TransactionID'];
	$proID=$x['ProductID'];
	$s= "SELECT Quantity FROM orderprocessing WHERE TransactionID='$transID'";
	$result=mysqli_query($conn, $s);
	$tmp=mysqli_fetch_assoc($result);
	$orderQuantity=$tmp["Quantity"];


	$s= "DELETE FROM `orderprocessing` WHERE TransactionID='$transID'";
	if (mysqli_query($conn , $s) )
	{
		$s= "SELECT QuantityInStock FROM product WHERE ProductID='$proID'";
		$result=mysqli_query($conn,$s);
		$tmp=mysqli_fetch_assoc($result);
		$addQuantity=$tmp["QuantityInStock"]+$orderQuantity;
		$s="UPDATE product SET QuantityInStock='$addQuantity' WHERE ProductID='$proID'";
		if(!mysqli_query($conn, $s))echo "<p class='text'>Failed<p>";
	}
	else
	{echo "<p class='text'> Failed!<p>";}
}

if (isset($_POST["ProductID"]))
{
	$productID=$_POST["ProductID"];
	$quantity=$_POST["dropDownQuantity"];
	$s= "SELECT QuantityInStock FROM product WHERE ProductID='$productID'";
	$result=mysqli_query($conn,$s);
	$tmp=mysqli_fetch_assoc($result);
	$oldQuantity=$tmp["QuantityInStock"];
	
	
	$s= "INSERT INTO `orderprocessing`
	(`CustomerID`, `ProductID`, `Quantity`, `DateBought`, `Processed`, `Shipped`)
	VALUES ('$customerID','$productID','$quantity','$curTime',0,0)";
	
	if (mysqli_query($conn , $s) )
	{
		echo "<p class='text'>Product Successfully Added To Shopping Cart<p>";
	
		$s= "SELECT QuantityInStock FROM product WHERE ProductID='$productID'";
		$result=mysqli_query($conn,$s);
		$tmp=mysqli_fetch_assoc($result);
		$addQuantity=$tmp["QuantityInStock"]-$quantity;
		if($addQuantity==0)$vis=0;
		else $vis=1;
		$s="UPDATE product SET QuantityInStock='$addQuantity', Visible='$vis' WHERE ProductID='$productID'";
		if(!mysqli_query($conn, $s))echo "<p class='text'>Failed<p>";
	}
	else
		echo "<p class='text'> Failed!<p>";
}



?>



<form action="EditRemoveProduct.php" class="editForm">
<input type="submit" value="Edit/Remove Product" name="submit" class="Button">
<input type="button" value="Return To Products Page" onclick="window.location.href='ProductPage.php'" class="Button">
<br><br><input type="button" value="Check out" onclick="window.location.href='checkOutPage.php'" class="Button">
</form>

   </div>
        
    <div class="Footer"><a href = "homepage.php"> ZLASH.com </a></div>
    </body>
</html>

