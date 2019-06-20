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
$cpf = $_POST['cpf']; 
$dia  = $_POST['dia'];
$comprou = $_POST['comprou'];
$valor = $_POST['valor'];


$inserir = "insert into compra(cpf,dia,comprou,valor)
values('$cpf','$dia','$comprou','$valor')";

mysqli_query($link,$inserir);

if($inserir){
	echo "<center class='mensagem'> Compra cadastrada </center><br>";
	echo "<center><button><a href='painel.php'>Voltar</a></button></center>";

}else{
	echo "<center class='mensagem'> Falha </center>";
}
?>
</div>
	</body>
</html>