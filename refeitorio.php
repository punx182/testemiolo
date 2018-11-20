<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Paginal Principal</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />

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
				<img class="zoom" src="img/ref/card.png" </img>
  <?php include_once("template_footer.php");?>
</div>
</body>
</html>