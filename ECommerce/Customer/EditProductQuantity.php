<?php session_start();?>

<html>
<body>

<head>
<title>ZLASH - editing product quantity</title>    
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

if(isset($_POST['submitEdit'])){
	
	$productID=$_POST['prodID'];
	$quantity=$_POST['dropDownQuantity'];
	$transID=$_POST['transID'];
	$productName=$_POST['productName'];
	
	$s= "SELECT Quantity FROM orderprocessing WHERE TransactionID='$transID'";
	$result=mysqli_query($conn, $s);
	$tmp=mysqli_fetch_assoc($result);
	$orderQuantity=$tmp["Quantity"];
	
	$changedQuantity=$orderQuantity-$quantity;
	
	$s = "UPDATE orderprocessing SET Quantity='$quantity' WHERE TransactionID='$transID'";
	if (mysqli_query($conn , $s) )
	{
		$msg= "Quantity of '$productName' is successfully edited";
		
		$s= "SELECT QuantityInStock FROM product WHERE ProductID='$productID'";
		$result=mysqli_query($conn,$s);
		$tmp=mysqli_fetch_assoc($result);
		$addQuantity=$tmp["QuantityInStock"]+$changedQuantity;
		if($addQuantity==0)$vis=0;
		else $vis=1;
		$s="UPDATE product SET QuantityInStock='$addQuantity', Visible='$vis' WHERE ProductID='$productID'";
		if(!mysqli_query($conn, $s))$msg= "Failed";
	}
	else
	{$msg= "Failed!";}
	
	$_SESSION["MSG"]=$msg;
	Header('Location:ShoppingCartPage.php');
}

$data=$_POST["dropDownProduct"];
$data=unserialize($data);

$productID=$data[0];
$transID=$data[1];
$productName=$data[2];

$s= "SELECT QuantityInStock FROM product WHERE ProductID='$productID'";
$result=mysqli_query($conn,$s);
$tmp=mysqli_fetch_assoc($result);
$QuantityinStock=$tmp["QuantityInStock"];

$s= "SELECT Quantity FROM orderprocessing WHERE TransactionID='$transID'";
$result=mysqli_query($conn, $s);
$tmp=mysqli_fetch_assoc($result);
$orderQuantity=$tmp["Quantity"];

$maxQuantity=$QuantityinStock+$orderQuantity;


?>

<form method="post" action="EditProductQuantity.php" class="editForm">
Please Enter new quantity:
<?php 

echo "<select name='dropDownQuantity'>";

for($i=1;$i<=$maxQuantity;$i++){
	echo "<option value='$i'>$i</option>";
}
echo "</select>";

?>
<input type="hidden" name="prodID" value="<?php echo $productID?>">
<input type="hidden" name="transID" value="<?php echo $transID?>">
<input type="hidden" name="productName" value="<?php echo $productName?>">
<input type="submit" name="submitEdit" value="go" class="Button">
</form>

   </div>
        
    <div class="Footer"><a href = "homepage.php"> ZLASH.com </a></div>
    </body>
</html>

