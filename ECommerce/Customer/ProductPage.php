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

session_start();

$selected='';

//If category is chosen
if (isset($_POST['showCategory'])) 
{
    $selected=$_POST['showCategory'];
    $_SESSION['$selected'] =$selected;
    $subQuery="SELECT distinct subCategory from Product WHERE Category='$selected'";      
}

//if subCategory is chosen
if (isset($_POST['showSubCategory'])) 
{
    $selected = $_SESSION['$selected'];
    
    $selected_sub = $_POST['showSubCategory'];
    $subQuery2="SELECT * from Product WHERE Category='$selected' AND subCategory='$selected_sub'";      
}

//database Connection
function database_connect($select_database)
{
    $conn = mysqli_connect("localhost", "root", "",$select_database);

    if (!$conn) 
    {
	   die("Connection failed: " . mysqli_connect_error()); 
       return false;
    }

    else
    {
        return $conn;
    }
}

//get categories and make their drop down menu
function print_dropdown($query, $link)
{
    $queried = mysqli_query($link, $query);

    // $menu = '<select name="showCategory" onchange="this.form.submit();">';
    $menu = '<option disabled>Select Category</option>';

    while ($result = mysqli_fetch_array($queried)) 
    {
        $menu .= '
      <option value="' . $result[0] . '">' . $result[0] . '</option>';
    }

    $menu .= '</select>';
    return $menu;
}

//send options to html form
function getOptions($q)
{
    echo print_dropdown($q, database_connect("e-commerce"));
}


// Will get into this condition if both category and sub category are chosen
if(isset($selected_sub) || isset ($subQuery2))
{
    include('connection.php');
    unset($_SESSION['$selected']);
    
    
    
    $result=mysqli_query($conn ,$subQuery2);

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
        
        ?>
        
        <form method="post" action="ShoppingCartPage.php">
		Please Enter Quantity:
		<?php 
        echo "<select name='dropDownQuantity'>";
		
		for($i=1;$i<=$orderQuantity;$i++){
			echo "<option value='$i'>$i</option>";
		}
		echo "</select>";
        ?>
        <br>
        <input type="hidden" name="ProductID" value="<?php echo $productID?>">
        <input type="submit" name="Quantitysubmit" value="Add to ShoppingCart">
        <br>
        <!-- <a href = "UpdatePage.php?ProductID=<?php echo $x["ProductID"]?>">	Add to ShoppingCart </a>  -->
         
        <br>
<?php 
echo "-----------------<br>";
    }

}

?>

</form>


       

        <p class="text"><b>Select category</b></p>
        <form action="<?php echo $_SERVER['PHP_SELF']?> "  method="POST">
            <select name="showCategory" onchange="this.form.submit();">
                
                <?php 
                    if ($secelted == '')
                        {
                            if (!isset($_SESSION['$selected']))
                            {
                                getOptions("SELECT distinct Category from Product");
                            }
                        
                            else 
                            {
                                $selected=$_SESSION['$selected'];
                                echo '<option value="' . $selected . '">' . $selected . '</option>';
                            }
                        }
                ?>
                
            </select>
            <input type="submit" name="submit" value="submit" class="Button"/>
       </form>
       
        
        <p class="text"><b>Select subCategory</b></p>
        <form action="<?php echo $_SERVER['PHP_SELF']?> "  method="POST">
            <select name="showSubCategory" onchange="this.form.submit();">
                
                <?php if($subQuery!='') getOptions($subQuery);?>
                
                
            </select>
            <input type="submit" name="submit" value="submit" class="Button"/>
        </form>
        
        <form action="ViewAllProducts.php"  method="POST">
            <p class="text"><b>Or Click here to view All Products: </b><p>
                 <input type="submit" name="submit" value="ViewAll" class="Button" />
            <br><br>
        </form>
        </div>
        
        <div class="Footer"><a href = "homepage.php"> ZLASH.com </a></div>
    </body>
</html>