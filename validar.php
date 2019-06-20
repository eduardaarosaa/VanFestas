
		<?php
session_start();
$login=$_POST['login'];
$senha=$_POST['senha'];

$conexao=mysqli_connect("localhost","root","","buffet");
$consulta="SELECT * FROM cadastro WHERE login='$login' and senha='$senha'";
$SESSION['login']=$_POST['login'];
$SESSION['senha']=$_POST['senha'];

$resultado=mysqli_query($conexao,$consulta);
$verificar=mysqli_num_rows($resultado);
if($verificar>0){
	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $senha;
	header("location:painel.php");
    //echo "Login = " . $_SESSION['login'];
    //echo "Codigo =" . $SESSION['codusuario'];
}else{
	header("location:login.php?alert=1");
	//echo "<script>alert('dadoverificardo->codigo>";
	//echo "<h1><center>dados inválidos</h1></center>";
}
mysqli_free_result($resultado);
mysqli_close($conexao);
?>
