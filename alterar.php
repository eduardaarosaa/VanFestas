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
	<link rel="stylesheet" href="bootstrap.min.css">
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
				<div class="logo">
			<img src="logo.png" width="250">
		</div>



<?php

	$link = mysqli_connect("localhost","root","","buffet");

	$nome=$_POST['nome'];
	$cpf=$_POST['cpf'];
	$endereco=$_POST['endereco'];
	$numero=$_POST['numero'];
	$bairro=$_POST['bairro'];
	$cidade=$_POST['cidade'];
	$cep=$_POST['cep'];
	$email=$_POST['email'];
	$telefone=$_POST['telefone'];


	$atualizar= mysqli_query($link,"UPDATE clientes set nome='$nome', cpf='$cpf', endereco='$endereco', numero='$numero', bairro='$bairro', cidade='$cidade', cep='$cep', email='$email', telefone='$telefone' where cpf = '$cpf'");
	if($atualizar){
		 echo "<center class='mensagem'>Dados alterados</center>";
	}else{

		echo "<center class='mensagem'>Falha!</center>";
	}
	?>

	</div>
	</body>
</html>