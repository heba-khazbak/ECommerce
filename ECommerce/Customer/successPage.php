<?php session_start();?>

<html>
<body>

<head>
<title>ZLASH - Succesfuly bought</title>    
<link rel="stylesheet" href="css/Main.css" type="text/css"/> 
</head>
    
    <body>
        
        <div class="Header">
        <a href="HomePage.php">
        <img src="css/Logo.png" alt="Logo" style="width:633; height:181px" >
        </a>
        </div>
    
        <div class="Header1">
        </div>

        <div class="cont">

<?php

$ID = $_GET['TransactionID'];

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

$s = "UPDATE orderprocessing SET Processed='1' WHERE TransactionID = $ID ";

if (mysqli_query($conn , $s) )
{
	echo " <p class='text'>Successfully Updated".  "<br>";
    echo "Thank you ".$_SESSION['CustomerName']." for purchasing from our website" ."<br>";
    echo "Your Transaction ID " . $ID . "<br><p>";
}
else
	echo "<p class='text'>Failed! <p>";


?>
 
<center > <img src="css/ThankYou.jpg"  width="200" height="200"> </center>

  <div class="Footer"><a href = "homepage.php"> ZLASH.com </a></div>
    </body>
</html>
