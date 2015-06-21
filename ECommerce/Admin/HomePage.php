<?php
session_start();
?>

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
   

<font color="#80aabc" size=40>  
<center style="font-family:verdana; margin-top:25px;"> <b> <img src="css/HomePage.png"  width="100" height="100"> Welcome Admin </b> </center>
</font>
<br><br>
<hr>
<br><br><br>
</head>

<body>
    <div id="loginDiv" style="display: none;">  
        
<font size=15 class="text"> <b> Sign in </b> </font>

<form action=Validation.php method="POST" class="editForm">

User Name: <input type="text" id="email" name="username"><br>
Password: <input type="password" id="pass" name="password"><br>
<input type="submit" value="Submit" class="Button">

</form>
        
    </div>


<div id="HomeDiv" style="display: none; margin-right:40%;">    
<a href="StorePage.php" class="Links">Store Page</a>
<br><br>
<a href="ShippingPage.php" class="Links">Ship Products</a>
<br><br>
<a href="CustomerAccountsPage.php" class="Links">Customer Accounts Page</a>
<br><br>
<a href="Logout.php" class="Links">Logout</a>
<br><br>

</div>
    
<br>
<hr>
<br>   
    </div>
</body>
</html>
<?php

if(isset($_SESSION['AdminName']) && !empty($_SESSION['AdminName'])) {
  
    $showdiv = 'HomeDiv';
}
else
{
     $showdiv = 'loginDiv';
 
}
 echo "<script type=\"text/javascript\">document.getElementById('".$showdiv."').style.display = 'block';</script>";

?>