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
			</form>
			<br>
<?php
$link = mysqli_connect("localhost","root","","buffet");
$busca=$_POST['palavra'];
$resultado="SELECT * FROM clientes where cpf LIKE '%$busca%'";
$exibir = mysqli_query($link,$resultado);
while($rows = mysqli_fetch_array($exibir)){
  					echo "<div class='container'>          
 <table class='table table-striped'>
   <thead>
     <tr>
       <th>Nome do Cliente</th>
       <th>CPF</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a href='detalhes.php?cpf=".$rows['cpf']. "''>" . $rows['nome'] . "</a></td>";
        echo "<td>" . $rows['cpf'] . "<br></td>";
   
   echo " </tr>
   </tbody>
  </table>
</div>";

}

?>
</div>
	</body>
</html>