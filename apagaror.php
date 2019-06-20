<?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:login.php');
    }
 
$logado = $_SESSION['login'];
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Van Festas</title>
	<link rel="stylesheet" type="text/css" href="painel.css"/>
	<link rel="icon" href="logo.png" type="image/x-icon" />

</head>
	<body>
			<nav id='menu'>
				<ul>
					<li><a href="dados.php">Dados Pessoais</a></li>
					<li><a href="painel.php">Clientes</a></li>
					<li><a href="addclientes.php">Add Clientes</a></li>
					<li><a href="contatos.php">Contatos</a></li>
					<li><a href="orcamento.php">Orçamento</a></li>
					<li><a href="sair.php">Sair</a></li>
				</ul>
			</nav>
			<div id="tudo">
			<img class="logo" src="logo.png" width="250">

			<br>

<?php

$link = mysqli_connect("localhost","root","","buffet");

$codigo=$_POST['codigo'];

$deletar = "delete from orcamento where id='$codigo'";

$apagou = mysqli_query($link,$deletar);

if ($apagou){
	echo "<center class='mensagem'>O orçamento foi apagado com sucesso<center>";
}

else{
		echo "<center class='mensagem'>Falha<center>";

}

?>

</div>
	</body>
</html>