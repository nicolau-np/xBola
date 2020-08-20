<?php 
ob_start();
session_start();
include("../config/conn.php");
if(!isset($_SESSION['nomeS']) && (!isset($_SESSION['senhaS'])))
{
    header("location:../entrar.php?acao=negado");exit;
}

$nome=$_SESSION['nomeS'];
$sala=$_SESSION['sala'];

if(isset($_POST['sv']))
{
    $sa=$_POST['cbsala'];
    $sql="update jogadores set sala=:sala where nome=:nome";
    try
    {
      $re=$con->prepare($sql);
      $re->bindParam(":sala",$sa,PDO::PARAM_STR);
      $re->bindParam(":nome",$nome,PDO::PARAM_STR);
      $re->execute(); 
      
      
      //jogadores
      $sql="select *from jogadores where nome=:a";
try
{
	$result=$con->prepare($sql);
	$result->bindParam(":a",$nome,PDO::PARAM_STR);
	$result->execute();
$mostra=$result->fetch(PDO::FETCH_OBJ);
$sala3=$mostra->sala;
$_SESSION['sala']=$sala3;

 echo"<script>
      alert('Feito com sucesso');
      window.location.href='home.php';
      </script>"; 
}
catch(PDOException $e)
{
    echo $e;
}
      
      
      
     
    }
    catch(PDOException $e)
    {
        echo $e;
    }
}
?>
<!Doctype html>
<html>
<head><title>Mudar de sala</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script src="assets/js/jquery-1.5.2.js"></script>

</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h4>Mudar de Sala</h4>
<hr />
<form action="mudar.php" method="post" id="fr" name="fr">
<select size="1" name="cbsala" class="form-control">
<option value="<?php echo $sala;?>"><?php echo $sala;?></option>
	<option value="Sala 1">Sala 1</option>
	<option value="Sala 2">Sala 2</option>
	<option value="Sala 3">Sala 3</option>
	<option value="Sala 4">Sala 4</option>
</select>
<br />
<input type="submit" value="Salvar" name='sv' class="btn btn-success"/>
</form>

</div>
</div>
</div>

</body>

</html>
