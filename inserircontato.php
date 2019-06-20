<!DOCTYPE html>
<html>
<head>
	<title>Buffet Van Festas</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="home.css">
	<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Kalam|Shadows+Into+Light+Two" rel="stylesheet">
	<link rel="icon" href="logo.png" type="image/x-icon" />


</head>
<body>
	<div id="inf">
		<p>Contato: (11)952870646 / Email: vanfesta2012@gmail.com</p>
	</div>
<img class="logo" src="logo.png" width="250">
<!--<p class="Domiciliar">Domiciliar</p>-->
<nav id="menu">
	<ul>
		<li><a href="index.html">Home</a></li>
		<li><a href="quemsomos.html">Quem Somos</a></li>
		<li><a href="servicos.html">Serviços</a></li>
		<li><a href="galeria.html">Galeria de Fotos</a></li>
		<li><a href="contato.html">Contato</a></li>
		<li><a href="orcamento.html">Orçamento</a></li>
	</ul>
	</nav><br><br>	
<?php
$link = mysqli_connect("localhost","buffetvanfestas","evelyn2000","buffet");
$nome = $_POST['nome']; 
$assunto = $_POST['assunto'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

//echo $nome;
$inserir= "insert into contatos(nome,assunto,email,mensagem)values('$nome','$assunto','$email','$mensagem')";

var_dump(mysqli_query($link,$inserir));

if($inserir){
	echo "<center class='men'>"  . $nome . ", mensagem enviada com sucesso!<br>Em breve retornaremos.</center>" ;

}else{
	echo "<center class='men'>Falha ao enviar mensagem!</center>" ;
}

?>

	</body>
</html>