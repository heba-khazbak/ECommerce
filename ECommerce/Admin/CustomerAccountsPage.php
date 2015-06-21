<html>
<html>
<body>

<head>
    <title>ZLASH - (Admin)Customer Account</title>    
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

<h2>Customer Accounts</h2>

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


$s = "SELECT * FROM customer ";

$result = mysqli_query($conn , $s);

while($x = mysqli_fetch_array($result)) {
?>
<a class="Links" href = "EditCustomer.php?CustomerID=<?php echo $x["CustomerID"]?>">	<?php echo "Name: " . $x["FirstName"]; ?> </a>
<br><br>
<?php 
}
?>
        </div>
</body>
</html>