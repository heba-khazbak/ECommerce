<?php session_start();?>

<html>

<body>

<head>
<title>ZLASH - Customer Information</title>    
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
        <p >Products Page</p>
        </div>

        <div class="cont">


<?php

$ID = $_SESSION["CustomerID"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-commerce";

$conn = mysqli_connect($servername, $username, $password , $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$s = "SELECT * FROM customer WHERE CustomerID=".$ID;

$result = mysqli_query($conn , $s);
$x = mysqli_fetch_assoc($result);

$FirstName=$x["FirstName"];
$LastName=$x["LastName"];
$Password=$x["Password"];
$BillingAddress=$x["BillingAddress"];
$BillingCity=$x["BillingCity"];
$BillingState=$x["BillingState"];
$BillingZip=$x["BillingZip"];
$ShippingAddress=$x["ShippingAddress"];
$ShippingCity=$x["ShippingCity"];
$ShippingState=$x["ShippingState"];
$ShippingZip=$x["ShippingZip"];
$Phone=$x["Phone"];

if(isset($_POST['submit'])){
	$FirstName=$_POST["FirstName"];
	$LastName=$_POST["LastName"];
	$Password=$_POST["Password"];
	$BillingAddress=$_POST["BillingAddress"];
	$BillingCity=$_POST["BillingCity"];
	$BillingState=$_POST["BillingState"];
	$BillingZip=$_POST["BillingZip"];
	$ShippingAddress=$_POST["ShippingAddress"];
	$ShippingCity=$_POST["ShippingCity"];
	$ShippingState=$_POST["ShippingState"];
	$ShippingZip=$_POST["ShippingZip"];
	$Phone=$_POST["Phone"];
	
	$s= "UPDATE customer SET
		 FirstName='$FirstName',
		 LastName='$LastName',
		 Password='$Password',
		 BillingAddress='$BillingAddress',
		 BillingCity='$BillingCity',
		 BillingState='$BillingState',
		 BillingZip='$BillingZip',
		 ShippingAddress='$ShippingAddress',
		 ShippingCity='$ShippingCity',
		 ShippingState='$ShippingState',
		 ShippingZip='$ShippingZip',
		 Phone='$Phone'
		 WHERE CustomerID='$ID'";
	
}

?>
            
            
<?php 

if(isset($_POST['submit'])){
	if (mysqli_query($conn , $s) )
	{
		echo " <p class='text'>Successfully Updated</p>";
	}
	else
		echo "<p class='text'>Failed!</p>";
}


?>

            

<form method="post" action="CustomerInformationPage.php" class="editForm">

First Name:<input type="text" id="Fname" name="FirstName" value="<?php echo $FirstName ?>"><br>
Last Name:<input type="text" id="Lname" name="LastName" value="<?php echo $LastName ?>"><br>
Password:<input type="password" id="pass" name="Password" value="<?php echo $Password ?>"><br>
Billing Address:<input type="text" id="Baddress" name="BillingAddress" value="<?php echo $BillingAddress ?>"><br>
Billing City:<input type="text" id="Bcity" name="BillingCity" value="<?php echo $BillingCity ?>"><br>
Billing State:<input type="text" id="Bstate" name="BillingState" value="<?php echo $BillingState ?>"><br>
Billing Zip:<input type="text" id="Bzip" name="BillingZip" value="<?php echo $BillingZip ?>"><br>
Shipping Address:<input type="text" id="Saddress" name="ShippingAddress" value="<?php echo $ShippingAddress ?>"><br>
Shipping City:<input type="text" id="Scity" name="ShippingCity" value="<?php echo $ShippingCity ?>"><br>
Shipping State:<input type="text" id="Sstate" name="ShippingState" value="<?php echo $ShippingState ?>"><br>
Shipping Zip:<input type="text" id="Szip" name="ShippingZip" value="<?php echo $ShippingZip ?>"><br>
Phone Number:<input type="text" id="phone" name="Phone" value="<?php echo $Phone ?>"><br>
<input type="submit" name="submit" value="submit" class="Button">
</form>

            

      </div>
        
    <div class="Footer"><a href = "homepage.php"> ZLASH.com </a></div>
    </body>
</html>

