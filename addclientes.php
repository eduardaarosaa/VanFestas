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
			<p class="add">Para adicionar novos clientes preecha o questionário</p>
			<form action="inserircliente.php" method="POST">
				<input type="text" name="nome" placeholder="Nome"><br><br>
				<input type="text" name="cpf" placeholder="CPF"><br><br>
				<input type="text" name="endereco" placeholder="Endereço"><br><br>
				<input type="text" name="numero" placeholder="Número"><br><br>
				<input type="text" name="bairro" placeholder="Barro"><br><br>
				<input type="text" name="cidade" placeholder="Cidade"><br><br>
				<input type="text" name="cep" placeholder="cep"><br><br>
				<input type="email" name="email" placeholder="Email"><br><br>
				<input type="text" name="telefone" placeholder="Telefone"><br><br>
				<button type="submit" name="cadastrar">Cadastrar</button>
				<button type="reset" name="cancelar">Cancelar</button>

			</form>
		</div>
	</body>
</html>