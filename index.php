<?php 
include "storescripts/connect_to_mysql.php"; 
$dynamicList = "";
$sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC LIMIT 5");
$productCount = mysql_num_rows($sql); 
if ($productCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $dynamicList .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a></td>
          <td width="83%" valign="top">' . $product_name . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $id . '">Ver Detalhes do produto</a></td>
        </tr>
      </table>';
    }
} else {
	$dynamicList = "Ainda não temos produtos listados na nossa loja";
}
mysql_close();
?>

<html lang="pt-br"">
	<head>	
	  <meta charset="utf-8">	
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">	 
	  <meta name="viewport" content="width=device-width, initial-scale=1">	
<title>MIOLO WINE GROUP</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");
  	if (isset($_GET['success'])){
			echo "Registrado com Sucesso.";
	}
  	if (isset($_GET['userloginsuccess'])){
			echo "Login efetuado com Sucesso.";
	}
	if (isset($_GET['resetsuccess'])){
			echo "Senha alterada com sucesso.";
	}
  ?>
  <div id="pageContent">
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td width="32%" valign="top"><h3>Miolo Wine Group</h3>
      <p>Nossos colaboradores tem descontos exclusivos! não perca a oportunidade de degustar os melhores vinhos com o melhor preço!<br />
      <p>Lembre-se sempre dos prazos de solicitação e pagamentos <br /></p></td>
    <td width="35%" valign="top"><h3>VINHOS EM DESTAQUES</h3>
      <p><?php echo $dynamicList; ?><br />
        </p>
      <p><br />
      </p></td>
		<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);

	session_start();
	if(!isset($_SESSION['user']))
	{
	 ?>
    <td width="33%" valign="top">
		<h3><a href="../pedido/user_registration.php">Novo por aqui, faça seu cadastro!</a></h3>
		<p>Ja é cadastrado?aproveite!<a href="../pedido/user_login.php">Conecte</a> e aproveite agora os descontos para funcionarios!</p>
		<a href="../pedido/user_login.php" class="myButton">Entrar</a>
	</td>
<?php } ?>
   
  </tr>
</table>

  </div>
  <?php include_once("template_footer.php");?>
</div>
</body>
</html>

<?php
 // Pegar título de um site com cURL
 $site_url = "http://codigofonte.com.br"; //URL do site que se quer pegar informações
 
$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $site_url);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
	ob_start();
	curl_exec($ch); 
	curl_close($ch);
$file_contents = ob_get_contents();
	ob_end_clean();
       
 if (preg_match('/<title>([^<]++)/', $file_contents, $matches) == FALSE)
 $erro = "Erro ao resgatar o titulo do site"; // se der algum erro
       
 echo $matches[1];
?>
<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>


