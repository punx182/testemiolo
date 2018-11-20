


<div id="pageHeader" ><table width="100%" border="0" cellspacing="0" cellpadding="12" bgcolor="#000000">
  <tr>
<style>
.container {
  position: relative;
  width: 60%;
}

.image {
  display: block;
  width: 80%;
  height: auto;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;

}

.container:hover .overlay {
  opacity: 3;
}

</style>  
	<div class="container">
			<img src="logo.jpg" alt="Logo" width="600" height="315" border="0" class="image" />
			<div class="overlay">
				<div class="logo2">
					<img src="logo2.jpg" alt="Logo" width="1200" height="480" border="0" class="image" />
				</div>	
			</div>		
	</div>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

session_start();
if(!isset($_SESSION['user']))
{
 ?>

</br>
<td width="68%" align="right"> <a href="../pedido/user_login.php">Login</a> | <a href="../pedido/forgetpass.php">Esqueceu sua senha?clique aqui</a></td>
<?php } ?>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

session_start();
if(isset($_SESSION['user']))
{
 ?>


    <td width="68%" align="right"> Seja bem vindo  <?php echo $_SESSION["user"] ?> <a href="../pedido/logout.php">Logout</a> | <a href="../pedido/cart.php">Seu Carrinho</a> | <a href="../pedido/user_profile.php">Editar perfil</a></td>
<?php } ?>
	</tr>
  <tr>
		<td colspan="2"><a href="../pedido/index.php">INICIAL</a>
		&nbsp; &middot; &nbsp; 
		<a href="../pedido/list_all_products.php">PRODUTOS</a>
		&nbsp; &middot; &nbsp; 
		<a href="../pedido/refeitorio.php">REFEITORIO</a>
		<div class="container">

		</td>
    </tr>
  </table>
</div>
