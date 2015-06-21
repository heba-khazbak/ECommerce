<?php
if(isset($_POST['FirstName'])){$firstname = $_POST['FirstName'];}
if(isset($_POST['LastName'])){$lastname = $_POST['LastName'];}
if(isset($_POST['BillingAddress'])){$billingAddress = $_POST['BillingAddress'];}
if(isset($_POST['ShippingAddress'])){$ShippingAddress = $_POST['ShippingAddress'];}
if(isset($_POST['PhoneNumber'])){$phoneNumber=$_POST['PhoneNumber'];}
if(isset($_POST['email'])){$email=$_POST['email'];}
if(isset($_POST['password'])){$Password=$_POST['password'];}
$Billingaddress=""; $pass="";$Lastname="";$Firstname="";$Phone="";$Email="";
$nameerr="";$namerr="";$bill="";$ph="";$EMAIL="";$Pass="";
 if(empty($firstname))
  {
    echo "Name IS Required";
	require 'SignUp.html';
	exit;
  }
 else if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) 
  {
     echo "Only letters and white space allowed"; 
	 require 'SignUp.html';
	 exit;
  }
  else
  {
  $Firstname=$_POST['FirstName'];
  }
 if(empty($lastname))
  {
    echo "Last Name IS Required";
	require 'SignUp.html';
		exit;
  }
 else if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) 
	 {
      echo "Only letters and white space allowed";
	  require 'SignUp.html';
	  exit;
	 }
	  
    else
	{
	 $Lastname=$_POST['LastName'];
	}
	  
 if(empty($billingAddress))
  {
    echo "BillingAddress Is Rquired";
	require 'SignUp.html';
		exit;
  }
  else if(!preg_match("/^[0-9a-zA-Z_!$@#^&]{5,20}$/", $billingAddress))
    {
      echo "Please insert valid Address";
	  require 'SignUp.html';
    	exit;
	}
   else
   {
     $Billingaddress=$_POST['BillingAddress'];
   }
    
 if(empty($phoneNumber))
  {
   echo "Phone Number is required";
   require 'SignUp.html';
	exit;
  }
 else if(!ctype_digit($phoneNumber))
    {
      echo "Enter valid phone number";
	  require 'SignUp.html';
	  	exit;
    }
  else
  {
    $Phone=$_POST['PhoneNumber'];
  }
  if(empty($email))
   {
    echo "Email is Required";
	require 'SignUp.html';
	exit;
		
   }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	 {
       echo "Invalid email format";
	   require 'SignUp.html';
	   exit;
     }
   else
   {
   $Email=$_POST['email'];
   }
   if(empty($Password))
   {
   echo "Password is required";
   require 'SignUp.html';
		exit;
   }
  else if(!preg_match("/^[0-9a-zA-Z_!$@#^&]{5,20}$/", $Password))
    {
      echo "invalid password !";
	  require 'SignUp.html';
	  exit;
    }
  else
  {
   $pass=$_POST['password'];
  }
  
$DB_name= "e-commerce";
$DB_username= "root";
$DB_password= "";
$DB_host= "localhost";
$conn = mysqli_connect($DB_host, $DB_username, $DB_password , $DB_name );

  $sql = "INSERT INTO customer (FirstName, LastName,BillingAddress,BillingCity,BillingState,BillingZip,ShippingAddress,ShippingCity,ShippingState,ShippingZip,Phone,Email,Password)
VALUES ('$Firstname', '$Lastname','$Billingaddress','null','null','$ShippingAddress','null','null','null','null','$Phone','$Email','$pass')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	require 'HomePage.php';
	exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
  ?>