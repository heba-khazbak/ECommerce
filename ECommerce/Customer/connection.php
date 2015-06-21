<?php 

$DB_name= "e-commerce";
$DB_username= "root";
$DB_password= "";
$DB_host= "localhost";

$conn = mysqli_connect($DB_host, $DB_username, $DB_password , $DB_name );

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

//@mysql_connect("$DB_host","$DB_username","$DB_password") or die ("Could not connect to mysql") ;

//@mysql_select_DB("$DB_name") or die ("DB doesn't exist");

//$_UpdateQuery ="update product set name='nothing' WHERE ProductID=1";
//$result= mysql_query($_SelectQuery);



?>
