<!DOCTYPE html>
<html>
<head>
	<title>Van Festas</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" a href="login.css">
	<link rel="icon" href="logo.png" type="image/x-icon" />

</head>
<body>
	<img class="logo" src="logo.png" width="250">
<form action="validar.php" method="post">
<a class="area">Área Restrita</a><br>
	Login:<br><input type="text" name="login" required="required"><br>
	Senha:<br><input type="password" name="senha" required="required"><br>
	<?php 
			if($_GET){
				if($_GET['alert'] == 1){
					echo "<p class='dados'>Dados inválidos</p>";
				}
			}
					?>
	<button type="submit" name="Enviar">Enviar</button>
	<button type="reset" name="cancelar">Cancelar</button>
	<button><a href="index.html">Voltar</a></button>
</form>
</body>
</html>