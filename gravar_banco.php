<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
if (isset($_GET['id'])) {
    include "storescripts/connect_to_mysql.php"; 
	$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 

	$sql = mysql_query("SELECT * FROM products WHERE id='$id' LIMIT 1");
	$productCount = mysql_num_rows($sql); 
    if ($productCount > 0) {
		while($row = mysql_fetch_array($sql)){ 
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $details = $row["details"];
			 $category = $row["category"];
			 $subcategory = $row["subcategory"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
         }
		 
	} else {
		echo "Item informado não foi encontrado.";
	    exit();
	}
		
} else {
	echo "Dados para renderizar esta página estão faltando.";
	exit();
}
mysql_close();
?>
<?php  
error_reporting(E_ALL);
ini_set('display_errors', '1');
include "storescripts/connect_to_mysql.php"; 
?>
<?php 
if(isset($_POST['cid']) && isset($_POST['pid'])){
	$cid = $_POST['cid'];
	$pid = $_POST['pid'];
	$sql = mysql_query("SELECT * FROM customer_cart WHERE customerid='$cid' LIMIT 1");
	$count = mysql_num_rows($sql);
	$prodquery = mysql_query("SELECT * FROM products WHERE id='$pid' LIMIT 1");
	while($row = mysql_fetch_array($prodquery)){
		$product_name = $row["product_name"];
		$details = $row["details"];
		$price = $row["price"];
		$date_added = $row["date_added"];
	}
	$quantity=1;	
	if($count==0){
		$ssql = mysql_query("INSERT INTO customer_cart (productid, customerid, product_name, details, price, quantity, date_added) VALUES('$pid','$cid','$product_name','$details','$price','$quantity',now())") or die (mysql_error());
	} else {
		$already = mysql_query("SELECT * FROM customer_cart WHERE productid='$pid' AND customerid='$cid' LIMIT 1");
		$acount = mysql_num_rows($already);
		if($acount!=0){
			while($row = mysql_fetch_array($already)){
				$aquantity = $row["quantity"];
				}
			$aquantity=$aquantity+1;
			$ssql = mysql_query("UPDATE customer_cart SET quantity='$aquantity' WHERE productid='$pid' AND customerid='$cid' ") or die (mysql_error());
		} else {
			$ssql = mysql_query("INSERT INTO customer_cart (productid, customerid, product_name, details, price, quantity, date_added) 
        	VALUES('$pid','$cid','$product_name','$details','$price','$quantity',now())") or die (mysql_error());
		}	
	}
	header("location: cart.php"); 
    exit();
	echo (ok);
}
?>
