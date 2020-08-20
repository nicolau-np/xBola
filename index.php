<?php 
ob_start();
session_start();
include("config/conn.php");

?>
<!Doctype html>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="user/assets/css/bootstrap.css"/>
<link rel="stylesheet" href="user/assets/css/bootstrap.min.css"/>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12 col-ms-12 col-xs-12" id="top">
<?php include("top.php");?>
</div>
</div>
<div class="row">
 <div class="col-md-4 col-md-offset-4">
 <br />
<div class="login-panel panel panel-default ">
<div class="panel-body">
<h3 class="panel-title">Faça o seu login</h3><br />
<?php 
if(isset($_POST['bt1']))
{
    $nome=$_POST['txtnome'];
    $senha=$_POST['txtsenha'];
    if(($nome=="")||($senha==""))
    {
     echo"<div class='alert alert-danger'>
     <button type='button' class='close' data-dismiss='alert'>×</button>
     Prenche os campos</div>";   
    }
    else
    {
        $sql="select *from tbl_user where nome=:a and senha=:b";
try
{
	$result=$con->prepare($sql);
	$result->bindParam(":a",$nome, PDO::PARAM_STR);
	$result->bindParam(":b",$senha, PDO::PARAM_STR);
	$result->execute();
$contar=$result->rowCount();
$mostra=$result->fetch(PDO::FETCH_OBJ);
if($contar>0)
{

$nome=$_POST['txtnome'];
$senha=$_POST['txtsenha']; 

$_SESSION['nomeS']=$nome;
$_SESSION['senhaS']=$senha;
$titulo=$mostra->titulo;
$estado=$mostra->estado;
if($estado=="OFF")
{
  echo'<div class="alert alert-danger">
 <button type="button" class="close" data-dismiss="alert">×</button>
 Usuário não permitido!
 </div>';  
}
else{



echo'<div class="alert alert-success">
Login feito com sucesso, a carregar...
</div>';
if($titulo=="admin")
{
    $_SESSION['nomeS']=$nome;
$_SESSION['senhaS']=$senha;
$_SESSION['tituloS']=$titulo;
 header("refresh:2, admin/home.php");exit;   
}
else{
    //jogador
    $sql="select *from jogadores where nome=:a and senha=:b";

	$result=$con->prepare($sql);
	$result->bindParam(":a",$nome, PDO::PARAM_STR);
	$result->bindParam(":b",$senha, PDO::PARAM_STR);
	$result->execute();

$mostra2=$result->fetch(PDO::FETCH_OBJ);
$titulo=$mostra2->titulo;
$estado=$mostra2->estado;
$pontos=$mostra2->pontos;
$sala=$mostra2->sala;



$atual="on";
$sql="update jogadores set actual=:atual where nome=:nome";
  $re=$con->prepare($sql);
  $re->bindParam(":atual",$atual,PDO::PARAM_STR);
  $re->bindParam(":nome",$nome,PDO::PARAM_STR);
  $re->execute();
    
    
$_SESSION['nomeS']=$nome;
$_SESSION['senhaS']=$senha;
$_SESSION['tituloS']=$titulo;
$_SESSION['sala']=$sala;
$_SESSION['pontos']=$pontos;
   header("refresh:2, user/home.php");exit;  
}
}
}
else
{
 echo'<div class="alert alert-danger">
 <button type="button" class="close" data-dismiss="alert">×</button>
 Erro ao fazer login!
 </div>';  
}

}catch(PDOException $e)
{
	echo $e;
}
    }
    
}

if(isset($_GET['acao']))
{
    $ac=$_GET['acao'];
    if($ac="negado")
    {
        echo'<div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                 Usuário não está logado!!
                            </div>'; 
    }
}
?>

<form role="form" method="POST" action="index.php" name="form1">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nome de usuário" name="txtnome" type="text" autofocus />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Palavra-passe" name="txtsenha" type="password" value=""/>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me"/>Lembrar-me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-primary btn-block" value="Entrar" name="bt1"/>
                                <a href="user/cad.php" class="btn btn-lg btn-success btn-block">Registar-se</a>
                            </fieldset>
                        </form>
                        <br />
                        <div class="text-center">
                        <a href="index.php">Voltar</a></div>


</div>
</div>
</div>
</div>


<div class="row">

<div class="footer">
<br />
<div class="col-md-12 col-ms-12 col-xs-12" id="rodape">
<?php include("rodape.php");?>
</div>
</div>
</div>
</div>
</body>
</html>
