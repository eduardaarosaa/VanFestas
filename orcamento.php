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
			<p class="titulo">
				Orçamentos
			</p>
			<br><br>
			<form action="apagaror.php" method="POST">
				Codigo do Orçamento:<input class='codigo' type="text" name="codigo" />
				<button type='submit' name="apagar">Apagar</button>
			</form>
			<br><br>
			<br>
			<?php
			$link = mysqli_connect("localhost","buffetvanfestas","evelyn2000","buffet");
			$consulta="select * from orcamento";
			$resultado= mysqli_query($link,$consulta);
			if($resultado){
  				while($linha = mysqli_fetch_assoc($resultado)){
  					echo "<div class='contato'>";
  					echo "Codigo do Orçamento:" . $linha['id'] . "<br>";
  					echo $linha['nome'] . "<br>";
  					echo $linha['email']  . "<br>";
  					echo $linha['celular'] . "<br>";
  					echo $linha['dia'] . "<br>";
  					echo $linha['tipo'] . "<br>";
  					echo $linha['info']  . "<br>";
  					echo $linha['pessoas'] . "<br>";
  					echo "</div>";
  					echo "<br><br><br>";

  					
  				}
  			}
  			?>
			</div>
	</body>
</html>