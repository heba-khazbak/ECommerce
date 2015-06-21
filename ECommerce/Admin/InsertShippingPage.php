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
$ID = $_GET['TransactionID'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-commerce";

$conn = mysqli_connect($servername, $username, $password , $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$select_query="SELECT * FROM orderprocessing WHERE TransactionID = $ID " ;



$result=mysqli_query($conn ,$select_query);

$row=mysqli_fetch_array($result);

$select_CustomerName = "SELECT FirstName FROM customer WHERE CustomerID =" . $row["CustomerID"];
$r=mysqli_query($conn ,$select_CustomerName);
$temp = mysqli_fetch_array($r);

$select_ProducrName = "SELECT Name FROM product WHERE ProductID =" . $row["ProductID"];
$r2=mysqli_query($conn ,$select_ProducrName);
$temp2 = mysqli_fetch_array($r2);

echo "<p class='text'>Customer Name : " . $temp["FirstName"] . "<br>"; 
echo "Product Name : " . $temp2["Name"]  ."<br>" ;
echo "Quantity: ".$row["Quantity"]. "<br>" . " DateBought: ".$row["DateBought"] ."<br>" ."<br><p>" ;



?>

<head>
<title> Inder Shipping Page</title>
</head>

<html>
<body>

<form name = "insertForm"  action="insertShippingPage.php?TransactionID=<?php echo $ID?>" method = "post" onsubmit="return isValid()"  >
Tracking Number : <input type = "text" id="name" name = "trackingNumber" > <br>
Shipping Company : <input type = "text" id="ID" name = "shippingCompany" > <br>

<input type = "submit" name = "submit" value = "Ship product" class="Button">
</form>


<script>
        
        function isValid()
            {
 
                var trackingNumber = document.forms["insertForm"]["trackingNumber"].value;
                var company = document.forms["insertForm"]["shippingCompany"].value;
                
                
              	var flag = true;

                if (trackingNumber != parseInt(trackingNumber, 10) || trackingNumber == "")
                {
                	alert("Please Enter a Valid Tracking Number" );
                	flag = false;
                }

                if (company == "")
                {
                	alert("Please Enter a Valid Shipping Company" );
                	flag = false;
                }
                
                	
                return flag;

                    
            }
            
</script>


<?php

//update database
//update flag
if(isset($_POST['submit'])){
$trackingNu = $_POST["trackingNumber"];
$Shippingcompany = $_POST["shippingCompany"];

$curTime=date('Y-m-d G:i:s');
$s= "UPDATE orderprocessing SET Shipped= 1,TrackingNumber = $trackingNu ,ShippingCompany = '$Shippingcompany' , DateShipped='$curTime' WHERE TransactionID = $ID";

if (mysqli_query($conn , $s) )
{
	echo " Successfully Updated";
}
else
	echo "Failed!";
}
?>
<br><br>
<a href="HomePage.php" class="Links">Return to Home Page</a>
            
        </div>
</body>
</html>