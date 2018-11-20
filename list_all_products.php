<?php



if(isset($_GET['sortby'])){
	$sortby = $_GET['sortby'];
} else {
	$sortby = "date_added";
}
if(isset($_GET['way'])){
	$way = $_GET['way'];
} else {
	$way = "DESC";
}
if(isset($_GET['filterby'])){
	$filterby = $_GET['filterby'];
}
else {
	$filterby = NULL;	
}
include "storescripts/connect_to_mysql.php";
if($filterby == NULL){
	$sql = mysql_query("SELECT * FROM products ORDER BY $sortby $way");
}
else {
	$sql = mysql_query("SELECT * FROM products WHERE category='$filterby' ORDER BY $sortby $way");	
}
$i = 0;
$dyn_table = '<table align="left" border="1" cellpadding="10" table width="100%">';
while($row = mysql_fetch_array($sql)){ 
    
    $id = $row["id"];
    $product_name = $row["product_name"];
	$price = $row["price"];
	$date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
    if ($i % 3 == 0) { 
        $dyn_table .= '<tr>
						<td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img class="zoom" style="border:#666 1px solid;" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a>
						' . $product_name . '<br/>
						$' . $price . '<br/>
						<a href="product.php?id=' . $id . '">Ver Detalhes</a>
						<input type="submit" name="button" id="button" value="Adicionar ao carrinho" />
						</td>';
    } else {
        $dyn_table .= '<td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img class="zoom" style="border:#666 1px solid;" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a>
						' . $product_name . '<br/>
						$' . $price . '<br/>
							<a href="product.php?id=' . $id . '">Ver Detalhes</a><br/>					
							   <form id="form1" name="form1" method="post" action="gravar_banco.php?id=' . $id .'">					
								<input type="submit" name="button" id="button" value="Adicionar ao carrinho" onclick="funcao1()"    />
								<input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
								<input type="hidden" name="cid" id="cid" value="<?php echo $_SESSION["id"]?"/>						
								<script>
										function funcao1(){
										alert("Item adicionado ao seu carrinho!");
										}
								</script>
								
								</form>
						</td>';
    }
    $i++;
	if ($i%3 == 0)
		$dyn_table .= '</tr>';
}
$dyn_table .= '</table';	
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Paginal Principal</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
<style>
img{
float: left;
margin-right: 5px;	
}
</style>
<style>

img{
float: center;
margin-right: 50px;	

}
.zoom {
    transition: transform .2s; /* Animation */

}
.zoom:hover {
    transform: scale(1.2); /* (200% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent" bgcolor="#2F4F4F">
    <p>Ordenar por : 
<select name="menu" onChange="window.document.location.href=this.options[this.selectedIndex].value;" value="Choose">
		<option value = ''> Escolha</option>
        <option value="../pedido/list_all_products.php?sortby=price&way=DESC&filterby=<?php 
		if(isset($_GET['filterby']))
			echo $filterby; 
		else
			echo NULL;
		?>">Preço: Maior para Menor</option>
        <option value="../pedido/list_all_products.php?sortby=price&way=ASC&filterby=<?php 
		if(isset($_GET['filterby']))
			echo $filterby; 
		else
			echo NULL;
		?>">Preço: Menor para Maior</option>
		<option value="../pedido/list_all_products.php?sortby=date_added&way=DESC&filterby=<?php 
		if(isset($_GET['filterby']))
			echo $filterby; 
		else
			echo NULL;
		?>">Data de Inclusão</option>
 </select> 
| Filtrar por: 
<select name="menu" onChange="window.document.location.href=this.options[this.selectedIndex].value;" value="Choose">
		<option value = ''> Escolha </option>
         <option value="../pedido/list_all_products.php">vazio</option>
          <option value="../pedido/list_all_products.php?filterby=Footwear&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">Almadén</option>
          <option value="../pedido/list_all_products.php?filterby=Clothing&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">Seival</option>
          <option value="../pedido/list_all_products.php?filterby=Watches&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">Miolo</option>
          <option value="../pedido/list_all_products.php?filterby=HandBag&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">Santa Colina</option>
          <option value="../pedido/list_all_products.php?filterby=Perfumes&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">Sucos</option>
          <option value="../pedido/list_all_products.php?filterby=Jewellery&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">Jewellery</option>
          <option value="../pedido/list_all_products.php?filterby=Sunglasses&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">Sunglasses</option>
          <option value="../pedido/list_all_products.php?filterby=EBooks&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">EBooks</option>
          <option value="../pedido/list_all_products.php?filterby=DVD&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">DVD's</option>
          <option value="../pedido/list_all_products.php?filterby=Gaming&sortby=<?php 
		if(isset($_GET['sortby']))
			echo $sortby; 
		else
			echo "date_added";
		?>&way=<?php 
		if(isset($_GET['way']))
			echo $way; 
		else
			echo "DESC";
		?>">Gaming</option>
 </select> 
    </p>
    <?php echo $dyn_table; ?>
  </div>
  <?php include_once("template_footer.php");?>
</div>
</body>
</html>