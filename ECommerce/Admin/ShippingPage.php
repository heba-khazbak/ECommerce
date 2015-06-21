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
    <h2>Shipping Page</h2>

<?php

//select products from database

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


$s = "SELECT * FROM orderprocessing WHERE Shipped = 0 and Processed = 1 ";

$result = mysqli_query($conn , $s);

while($x = mysqli_fetch_array($result)) {
?>
<br>
<a class="Links" href = "insertShippingPage.php?TransactionID=<?php echo $x["TransactionID"]?>">	<?php echo "TransactionID: " . $x["TransactionID"]; ?> </a>
<br>
<?php 
}
?>
        </div>
</body>
</html>