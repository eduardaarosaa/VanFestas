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
		$cpf = $_POST['cpf'];
$link = mysqli_connect("localhost","root","","buffet");
$consulta="SELECT * FROM clientes where cpf = '$cpf'";
$resultado = mysqli_query($link,$consulta);
if($resultado){
 while($dados=mysqli_fetch_array($resultado)) {
	$nome=$dados['nome'];
	//echo $id;
	$cpf=$dados['cpf'];
	$endereco=$dados['endereco'];
	$numero=$dados['numero'];
	$bairro=$dados['bairro'];
	$cidade=$dados['cidade'];
	$cep=$dados['cep'];
	$email=$dados['email'];
	$telefone=$dados['telefone'];
}
}
?>

<form action="alterar.php" method="POST">
	<input type="text" name="nome" value="<?php echo $nome ?>" >
	<input type="text" name="cpf" value="<?php echo $cpf ?>" >
	<input type="text" name="endereco" value="<?php echo $endereco ?>" >
	<input type="text" name="numero" value="<?php echo $numero ?>" >
	<input type="text" name="bairro" value="<?php echo $bairro ?>" >
	<input type="text" name="cidade" value="<?php echo $cidade ?>" >
	<input type="text" name="cep" value="<?php echo $cep ?>" >
	<input type="text" name="email" value="<?php echo $email ?>" >
	<input type="text" name="telefone" value="<?php echo $telefone ?>" >
	<br>
	<button type="submit">Alterar</button>

</form>

	</div>
	</body>
</html>







