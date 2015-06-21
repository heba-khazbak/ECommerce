<html>
<body>

<head>
    <title>ZLASH - (Admin)Store Page</title>    
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

            
<div>
<br>
<a class="Links" href ="addProduct.php"  >Add New Product</a>
<a href ="UpdateProductPage.php" class="Links">Update Products</a>
<br>
</div>
            
<h2>Our Products List</h2>

<?php

include ('connection.php');
$select_query="SELECT * FROM product ";
$result=mysqli_query($conn ,$select_query);
//$x = mysqli_fetch_assoc($result);

while ($x=mysqli_fetch_array($result))
{
    echo "<p class='text'><br>" ."Product name is:  ". $x['Name'] . "<br>";
    echo "Product Description:  ". $x['Description'] . "<br>";
    echo "Quantity in stock:  ". $x['QuantityInStock'] . "<br>";
    echo "Product Category:  ". $x['Category'] ." - " . $x['subCategory'] . "<br>";
    echo "Product Price:  ". $x['Price'] . "<br>";
    echo "Product Picture:  ". $x['Picture'] . "<br>";
    echo "-----------------<br><p>";    

}
?>

</div>
</body>
</html>
