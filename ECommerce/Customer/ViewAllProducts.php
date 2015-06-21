<html>
    
    <head>
        <title>ZLASH - Products Page</title>
        <link rel="stylesheet" href="css/Main.css" type="text/css"/>    
    </head>
    
    <body>
        
        <div class="Header">
        <a href="HomePage.php">
        <img src="css/Logo.png" alt="Logo" style="width:633; height:181px" >
        </a>

        </div>
    
        <div class="Header1">
        <p >Products Page</p>
        </div>

        <div class="cont">
<?php

include('connection.php');
    
$result=mysqli_query($conn ,"SELECT * FROM Product");

    while ($x=mysqli_fetch_array($result))
    {
        echo "<br>" ."<p class='text'>Product name is:  ". $x['Name'] . "<br>";
        echo "Product Description:  ". $x['Description'] . "<br>";
        echo "Product Category:  ". $x['Category'] ." - " . $x['subCategory'] . "<br>";
        echo "Product Price:  ". $x['Price'] . "<br>";
        
        $productID = $x["ProductID"];
        $s= "SELECT QuantityInStock FROM product WHERE ProductID='$productID'";
        $result2=mysqli_query($conn, $s);
        $tmp=mysqli_fetch_assoc($result2);
        $orderQuantity=$tmp["QuantityInStock"];
        

        echo "<form method='post' action='ShoppingCartPage.php'> Please Enter Quantity: ";
		
        echo "<select name='dropDownQuantity'>";
		
        for($i=1;$i<=$orderQuantity;$i++)
        {
			echo "<option value='$i'>$i</option>";
		}
		echo "</select><br>";
        
        
        echo "<input type='hidden' name='ProductID' value='".$productID. "'>";
        echo "<br>";
        echo "<input type='submit' class='Button' name='Quantitysubmit' value='Add to ShoppingCart'><br>";
        echo"<!-- <a href = 'UpdatePage.php?ProductID='".$x['ProductID']. "''>Add to ShoppingCart </a>  -->" ."<br>";
 

echo"</form>";
echo "</html>";
    }

?>
            
            </div>
        
    <div class="Footer"><a href = "homepage.php"> ZLASH.com </a></div>
    </body>
</html>