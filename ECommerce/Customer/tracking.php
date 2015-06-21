<body>

<head>
    <title>ZLASH - Tracking Products</title>    
    <link rel="stylesheet" href="css/Main.css" type="text/css"/>
    <link rel="stylesheet" href="css/SignUp.css" type="text/css"/>
</head>
    
    <body>
      
        <div class="cont"><br>


<?php
session_start();
$ID=$_POST['TransactionID'];
$id=$_SESSION['CustomerID'];
$DB_name= "e-commerce";
$DB_username= "root";
$DB_password= "";
$DB_host= "localhost";

$conn = mysqli_connect($DB_host, $DB_username, $DB_password , $DB_name );

 $Query = "select * from orderprocessing";
 $result = mysqli_query($conn,$Query);
 $flag=0;
 $flag1=0;
 while($row = mysqli_fetch_array($result) )
 {
 if($id==$row['CustomerID'])
 {
    if ($ID == $row['TransactionID'])
	{
	
   echo "<p class='text'>TransactionID : " .$row["TransactionID"]."<br>". "CustomerID : ". $row["CustomerID"]."<br>". " Product ID : ".$row["ProductID"]."<br>". "Quantity : ".$row["Quantity"]."<br>". " DateBought : " .$row["DateBought"]."<br>";
   echo " DateShipped : " .$row["DateShipped"]."<br>";
   
    if ($row["Processed"]==1)
      {
         echo "Processed"."<br>";
      }
	  
	else if ($row["Processed"]==0)
      {
         echo "Not Processed yet"."<br>";
      } 
	  
	  if ($row["Shipped"]==1)
      {
         echo "Shipped"."<br>";
      }
	  
	else if ($row["Shipped"]==0)
      {
         echo "Not Shipped yet"."<br>";
      } 
	  
	echo "Tracking Number : ".$row["TrackingNumber"]."<br>". " Shipping Company : ".$row["ShippingCompany"]."<br><p>";
	  
   $flag=1;
   $flag1=1;
        echo "<a href='HomePage.php' class='Links'>Go to Home page<a>";
   break;    
   exit;  
    }
 
 else
  {
    $flag=1;
	$flag1=0;
  } 
 } 
  else
  {
  $flag=0;
  $flag1=0;
  }
 
 
}
  if ($flag==1 && $flag1==0)
    {
      $_SESSION['namer']="<p class='text'> Invalid Transaction ID<p>";
      require 'trackingpage.html';
      exit;
    }
	else if ($flag==0 && $flag1==0)
	{
	 $_SESSION['namer']= "<p class='text'>Invalid User<p>";
	 require 'trackingpage.html';
      exit;
	}
?>
     
            
            
<div class="Footer"><a href = "homepage.php"> ZLASH.com </a></div>
        </div>
    </body>
</html>

