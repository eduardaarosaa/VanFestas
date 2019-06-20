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
<?php
$link = mysqli_connect("localhost","buffetvanfestas","evelyn2000","buffet");
$login = $_SESSION["login"];
$senha = $_POST['atual'];
$senha_nova = $_POST['nova'];
$confirme_senha = $_POST['cnova'];
$sql1 = "select * from cadastro where login='$login' and senha='$senha'";
//echo $sql1;
$sql=mysqli_query($link,$sql1);
$row= mysqli_fetch_array($sql);
$senha_banco = isset($row)?$row:'';

if ($row=='')
{
	//echo "<h2><center>Senhas não estão conhecidindo</h2></center>";
	//echo"<center><button><a href='meusdados.php'>Voltar</a></button></center>";
	echo 
	header("location:senha.php?alert=1");

	return false;
}

if(($senha_nova=="") && ($confirme_senha=="") && ($senha_banco==""))
{
//echo"<h2><center>Os campos das senhas não podem ser Nulos!</h2></center>";	
//echo"<center><button><a href='meusdados.php'>Voltar</a></button></center>";
echo 
	header("location:senha.php?alert=2");


return false;
}
else
{
if(($senha != $senha_banco) && ($senha_nova != $confirme_senha))
{
//echo"<h2><center>Senhas Digitadas não conhecidem!</h2></center>";
//echo"<center><button><a href='meusdados.php'>Voltar</a></button></center>";
echo 	
	header("location:senha.php?alert=4");

}
else
{
if($result=mysqli_query($link,"update cadastro set senha='$confirme_senha' where login='$login'"))
{

//echo"<h2><center>Senha alterada com sucesso</h2></center><br>";
	echo 	
	header("location:senha.php?alert=3");

echo"<center><button><a href='dados.php'>Voltar</a></button><center>";
}
}
}
?>