<?php
ob_start();
session_start();
include("../config/conn.php");
if(!isset($_SESSION['nomeS']) && (!isset($_SESSION['senhaS'])))
{
    header("location:../entrar.php?acao=negado");exit;
}
$ele=$_GET['nome'];
$eu=$_SESSION['nomeS'];
$nos1=$eu."_".$ele;
$nos2=$ele."_".$eu;
$id=$_GET['id'];



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="assets/js/jquery-1.5.2.js" type="text/javascript"></script>
<title>View</title>
<style>
.pe{
    font-size:10px;
}
</style>
</head>

<body>

 
<?php 
$pagina=(isset($_GET['pagina']))?$_GET['pagina']:1;

$sql="select *from chat where nos=:nos1 or nos=:nos2";
try{
   $result=$con->prepare($sql);
   $result->bindParam(":nos1",$nos1,PDO::PARAM_STR);
   $result->bindParam(":nos2",$nos2,PDO::PARAM_STR);
   $result->execute(); 
}
catch(PDOException $e)
{
    echo $e;
}
$total=$result->rowCount();
$registros=4;
$numpaginas=ceil($total/$registros);
$inicio=($registros*$pagina)-$registros;

$sql="select *from chat where id_message=:id order by id_message desc limit $inicio,$registros ";
try{
   $result=$con->prepare($sql);
   $result->bindParam(":id",$id,PDO::PARAM_STR);
   $result->execute(); 
}
catch(PDOException $e)
{
    echo $e;
}
$total=$result->rowCount();
while($ver=$result->fetch(PDO::FETCH_OBJ))
{
	
?>
<?php 
$nos=$ver->nos;
if($nos==$nos1)
{
    echo "<div class='alert alert-warning'>".$ver->descricao."<br/>
  <span class='pe'>".$ver->data."::".$ver->hora."</span>
  </div>";  
}
elseif($nos==$nos2)
{
  echo "<div class='alert alert-info'>".$ver->descricao."<br/>
  <span class='pe'>".$ver->data."::".$ver->hora."</span>
  </div>";   
}

}?>
<script>
$("document").ready(function(e){
$("#btos1").hide();
$("#btos2").hide();	
$("#txtna").val(<?php echo $pagina;?>);
$("#txtna2").val(<?php echo $numpaginas;?>);
var a=$("#txtna").val();
var b=$("#txtna2").val();
if(a!=1)
{
$("#btos1").show();	
}
if(a!=b)
{
	
$("#btos2").show();	
}
});
</script>
</body>
</html>

