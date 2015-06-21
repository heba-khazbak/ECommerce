<?php
session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <title>ZLASH - Customer HomePage</title>
        <link rel="stylesheet" href="css/Main.css" type="text/css"/>
    </head>

    <body>
        <div class="Header">
        <a href="HomePage.php">
        <img src="css/Logo.png" alt="Logo" style="width:633; height:181px" >
        </a>
        </div>
    
        <div class="Header1">
        <p >Home Page</p>
        </div>

        <div id="loginDiv" style="display: none; margin: 40px; margin-left: 40%;">  
             <form  style="display:inline; " action=LoginValidation.php method="POST">
             <i>Email</i>:<br>
            <input type="email" name = "email" id="email">
            <span class="error">*</span>
            <br><br>
            <i>Password</i>:<br>
            <input type="password" name = password id="password">
            <span class="error">*</span>
            <br><br>
            <br><input type="submit" value="Log in" class="Button">
             </form>
             <br><br>
             New Customer? <a href = "SignUp.html" class="links"> SignUp</a>
        </div>
 
 
        <div id="HomeDiv" style="display: none;">  
            <p class="text">Welcome <?php echo $_SESSION['CustomerName']?> to our website <br></p>
 
             <a href="ProductPage.php" class="Links">Product List Page</a>
             <br><br>
             <a href="CustomerInformationPage.php" class="Links">Customer's Information Page</a>
             <br><br>
             <a href="ShoppingCartPage.php" class="Links">Shopping Cart Page</a>
             <br><br>
             <a href="checkOutPage.php" class="Links">Check Out Page</a>
             <br><br>
             <a href="trackingpage.html" class="Links">Order Tracking Page</a>
             <br><br>
             <a href="Logout.php" class="Links">Logout</a>
             <br><br>
        </div>


        <div class="Footer">
            <a href = "homepage.php"> ZLASH.com </a>
        </div>
    
 </body>
 </html>
 
 
 <?php

if(isset($_SESSION['CustomerID']) && !empty($_SESSION['CustomerID'])) {
  
    $showdiv = 'HomeDiv';
}
else
{
     $showdiv = 'loginDiv';
 
}
 echo "<script type=\"text/javascript\">document.getElementById('".$showdiv."').style.display = 'block';</script>";

?>