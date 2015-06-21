 <html>
<body>

<head>
    <title>ZLASH - Admin HomePage</title>    
    <link rel="stylesheet" href="css/Main.css" type="text/css"/>
    <link rel="stylesheet" href="css/Forms.css" type="text/css"/>
</head>
    
    <body>
        
        <div class="Header">
        <a href="HomePage.php">
        <img src="css/Logo.png" alt="Logo" style="width:633; height:181px" >
        </a>
        </div>
    
        
        <div class="cont">

<?php
session_start();

$username=$_POST['username'];
$password=$_POST['password'];

$DB_name= "e-commerce";
$DB_username= "root";
$DB_password= "";
$DB_host= "localhost";

$conn = mysqli_connect($DB_host, $DB_username, $DB_password , $DB_name );
if(!$conn)
{
echo " Connection Failed ".mysql_error();
}
 //mysqli_select_db($DB_host);
 $Query = "select * from admin";
 $result = mysqli_query($conn,$Query);
 $flag = 0;
 $flag2 = 0;
 
//if(mysql_num_rows($result) == 0)
//echo"no results found";

//else{

 while($row = mysqli_fetch_array($result) )
{
  if ($username == $row['UserName']){

	if($password == $row['Password']){
            echo "Welcome to your home page".$row['UserName'];
	    $flag = 1;
	    $flag2=1;
        $_SESSION['AdminName']= $row['UserName'];
        Header('Location:HomePage.php');
            break; 
          }
 
        else{
             $h ="Wrong Password";
             $flag=1;
             $flag2=0;
        }
 }
 else{
 
 $flag=0;
 $flag2 = 0;
 
 }

}
	
	if($flag == 1 && $flag2==0){
	echo "$h";
	}

	if($flag==0 && $flag2==0){
	echo "<p class='text'>Wrong UserName!<p>";
	}
//}
?>
              </div>
</body>
</html>
