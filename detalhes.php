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
			<form action="buscar.php" method="POST">
				<input type="text" name="palavra" placeholder="Pesquisar clientes">
				<button type="submit" name="buscar">Buscar</button>
			</form><br>
			<?php
			$cpf=$_GET['cpf'];
			$link = mysqli_connect("localhost","root","","buffet");
			$consulta="select * from clientes where cpf = '$cpf'";
			$resultado= mysqli_query($link,$consulta);
			if($resultado){
  				while($linha = mysqli_fetch_assoc($resultado)){
  					echo "<table class='table table-bordered'>
    <thead>
      <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th>Endereço</th>
        <th>Número</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>CEP</th>
        <th>Email</th>
        <th>Telefone</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>"  . $linha['nome'] . "<br></td>";
        echo "<td>"  . $linha['cpf'] . "<br></td>";
        echo "<td>"  . $linha['endereco'] . "<br></td>";
        echo "<td>"  . $linha['numero'] . "<br></td>";
        echo "<td>"  . $linha['bairro'] . "<br></td>";
        echo "<td>"  . $linha['cidade'] . "<br></td>";
        echo "<td>"  . $linha['cep'] . "<br></td>";
        echo "<td>"  . $linha['email'] . "<br></td>";
        echo "<td>"  . $linha['telefone'] . "<br></td>";
      echo "</tr>
    </tbody>
  </table>
</div>";
  				}
  			}
  			?>
        <form action="alterardados.php" method="POST"/>
        <input type="text" name="cpf" value="<?php  echo $cpf ?>"/>
        <button type="submit">Alterar</button>
      </form>
  			<p class="titulo1"> Adicionar compra</p><br>
  			<form class="formadd" action="compra.php" method="POST">
  				<input type="text" name="cpf" required="required" value="<?php  echo $cpf;?>"><br>
  				<input type="text" name="dia" placeholder="Data da compra" /><br>
  				<textarea name="comprou" rows="10" cols="51" placeholder="compra do cliente"></textarea><br>
  				<input type="text" name="valor" placeholder="Valor total da compra"><br>
  					<button type="submit" name="adicionar">Adicionar</button>
  					 <button type="reset" name="cancelar">Cancelar</button>
  					</form>
  					<br><br>
  					<p class="titulo"> Compras realizadas pelo cliente</p>
  					<br>
  					<?php
$consulta="select * from compra where cpf = '$cpf'";
$resultado=mysqli_query($link,$consulta);
if($resultado){
  while($linha = mysqli_fetch_assoc($resultado)){
    echo "<div class='container'>          
 <table class='table table-striped'>
   <thead>
     <tr>
       <th>CPF</th>
       <th>Data da compra</th>
       <th>Compra</th>
       <th>Valor total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>" . $linha['cpf']  ."</td>" . "<td>" . $linha['dia'] . "</td>";
        echo "<td>" . $linha['comprou'] . "<br></td>";
        echo "<td>" . $linha['valor'] . "<br></td>";
   
   echo " </tr>
   </tbody>
  </table>
</div>";
  }
}
?>

		</div>
	</body>
</html>