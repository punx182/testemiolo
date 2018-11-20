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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $product_name; ?></title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent">
  <table width="100%" border="0" cellspacing="0" cellpadding="15" bgcolor="#2F4F4F">
  <tr>
    <td width="19%" valign="top"><img src="inventory_images/<?php echo $id; ?>.jpg" width="142" height="188" alt="<?php echo $product_name; ?>" /><br />
      <a href="inventory_images/<?php echo $id; ?>.jpg">ver imagem em tela inteira</a></td>
    <td width="81%" valign="top"><h3><?php echo $product_name; ?></h3>
      <p><?php echo "R$: ".$price; ?><br />
        <br />
        <?php echo "$subcategory $category"; ?> <br />
<br />
        <?php echo $details; ?>
<br />
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

session_start();
if(isset($_SESSION['user']))
{
 ?>
            </p>
      <form id="form1" name="form1" method="post" action="cart.php">
        <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
        <input type="hidden" name="cid" id="cid" value="<?php echo $_SESSION["id"]?>" />
        <input type="submit" name="button" id="button" value="Adicionar ao carrinho" />
      </form></td>
<?php } ?>
      </td>
    </tr>
</table>
  </div>
  <?php include_once("template_footer.php");?>
</div>
</body>
</html>