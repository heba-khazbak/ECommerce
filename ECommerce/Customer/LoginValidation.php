<?php session_start();?>

<?php


$email=$_POST['email'];
$password=$_POST['password'];
$DB_name= "e-commerce";
$DB_username= "root";
$DB_password= "";
$DB_host= "localhost";

$conn = mysqli_connect($DB_host, $DB_username, $DB_password , $DB_name );

 $Query = "select * from customer";
 $result = mysqli_query($conn,$Query);
 $flag = 0;

 
 while($row = mysqli_fetch_array($result) ){
 
    if ($email == $row['Email']){
		if($password == $row['Password']){
			echo "welcome ".$row['FirstName']."</br>";
			$_SESSION['CustomerID'] = $row['CustomerID'];
			$_SESSION['CustomerName'] = $row['FirstName'];
			
			Header('Location:homepage.php');
 	 		break; 
 			}

		}
 }
 
 echo "Wrong Email or Password";

 
	
	
?>