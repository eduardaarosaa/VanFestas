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

<?php
$link = mysqli_connect("localhost","buffetvanfestas","evelyn2000","buffet");
$nome = $_POST['nome']; 
$cpf  = $_POST['cpf'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$cep = $_POST['cep'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$inserir = "insert into clientes(nome,cpf,endereco,numero,bairro,cidade,cep,email,telefone)
values('$nome','$cpf','$endereco','$numero','$bairro','$cidade','$cep','$email','$telefone')";

mysqli_query($link,$inserir);

if($inserir){
	echo "<center class='mensagem'> Cliente cadastrado com sucesso </center><br>";
	echo "<center><button><a href='painel.php'>Voltar</a></button></center>";

}else{
	echo "<center class='mensagem'>Falha</center>" ;
}

?>


</div>
	</body>
</html>