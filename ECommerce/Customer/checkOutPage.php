<?php session_start();?>

<html>

<body>

<head>
<title>ZLASH - Checkout Page</title>    
<link rel="stylesheet" href="css/Main.css" type="text/css"/> 
</head>
    
    <body>
        
        <div class="Header">
        <a href="HomePage.php">
        <img src="css/Logo.png" alt="Logo" style="width:633; height:181px" >
        </a>
        </div>
    
        <div class="Header1">
        <p >Checkout Page</p>
        </div>

        <div class="cont">

<?php
//mesh 3rfa leh mesh 3gbo el line dh .. 
$customerID= $_SESSION['CustomerID'];

//$TranID='TransactionID';

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


//Shipping and Billing Information

$select_queryquery="SELECT * FROM customer Where customer.CustomerID=$customerID";
$rere= mysqli_query($conn ,$select_queryquery);
//$z=mysqli_fetch_assoc($rere);
while ($x=mysqli_fetch_array($rere) )
{
   echo "<p class='text'>Billing Address:  ". $x['BillingAddress'] . "<br>"; 
   echo "Billing City:  ". $x['BillingCity'] . "<br>"; 
   echo "Billing State:  ". $x['BillingState'] . "<br>"; 
   echo "Billing Zip:  ". $x['BillingZip'] . "<br>"; 
   echo "Shipping Address:  ". $x['ShippingAddress'] . "<br>"; 
   echo "Shipping City:  ". $x['ShippingCity'] . "<br>"; 
   echo "Shipping State:  ". $x['ShippingState'] . "<br>"; 
   echo "Shipping Zip:  ". $x['ShippingZip'] . "<br>"; 
   echo "=============================================";

}

//Shopping Cart Products
$select_query="SELECT * FROM orderprocessing WHERE Shipped=0 && Processed=0  && CustomerID=$customerID " ;

 
$result=mysqli_query($conn ,$select_query);


//$x = mysqli_fetch_assoc($result);
//$y = mysqli_fetch_assoc($r);

//lma 3mlt run nf3 en both yb2o fe nfs el while .. bs in case eno mnf3sh, el separated while commented t7t
while ($x=mysqli_fetch_array($result) )// && $y = mysqli_fetch_array($r))
{ 
    
    echo "<br>" ."Product ID is:  ". $x['ProductID'] . "<br>";
    echo "Product Quantity:  ". $x['Quantity'] . "<br>"; 
    
    $proID = $x['ProductID'];
    $select_q="SELECT * FROM product WHERE ProductID = $proID  ";
    $r=mysqli_query($conn ,$select_q);
   
    while($y = mysqli_fetch_array($r))
    {
        echo "Product Name:  ". $y['Name'] . "<br>";
        echo "Product Price:  ". $y['Price'] . "<br>";
    }
    
    
    echo "<br>";
    echo "<br>";
    
    ?>
    <a class='Links' href = "successPage.php?TransactionID=<?php echo $x['TransactionID'] ?> ">Purchase </a>
    
    <br>
    <?php 
    echo "<br>";
    echo "<br>";
    echo "<br><p>";
}


/*while ($x=mysqli_fetch_array($result) )
{
    echo "<br>" ."Product ID is:  ". $x['ProductID'] . "<br>";
    echo "Product Quantity:  ". $x['Quantity'] . "<br>"; 
}
while ($y = mysqli_fetch_array($r))
{
    echo "Product Name:  ". $x['Name'] . "<br>";
    echo "Product Price:  ". $x['Price'] . "<br>";
    echo "-----------------<br>";    
}
*/
?>
  <div class="Footer"><a href = "homepage.php"> ZLASH.com </a></div>
    </body>
</html>

