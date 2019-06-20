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
			<p class="add">Para alterar o login preencha os campos</p>
			<form action="altersenhapessoal.php" method="POST">
				<input type="text" name="atual" placeholder="Senha atual"><br><br>
				<input type="text" name="nova" placeholder="Senha nova"><br><br>
				<input type="text" name="cnova" placeholder="Confirmando Senha"><br><br>
				<?php
				if($_GET){
				if($_GET['alert'] == 1){
					echo "<span class='senha'>Senhas não conhecidem</span>";
				} if($_GET['alert'] == 2){
					echo "<span class='senha'>Senhas estão vazias";
				}if($_GET['alert'] == 3){
					echo "<span class='senha'>Senha alterada com sucesso!</span>";
				}if($_GET['alert']==4){
					echo "<span class='senha'>Senhas não conhecidem</span>";

				}
			}
			?>
				<button type="submit" name="cadastrar">Alterar</button>
				<button type="reset" name="cancelar">Cancelar</button>


			</form>
			</div>
	</body>
</html>