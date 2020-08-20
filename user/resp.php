<?php
ob_start();
session_start();
include("../config/conn.php");
if(!isset($_SESSION['nomeS']) && (!isset($_SESSION['senhaS'])))
{
    header("location:../entrar.php?acao=negado");exit;
}


$eu=$_SESSION['nomeS'];

$sql="select *from message where emissor=:eu";
try
{
  $re=$con->prepare($sql);
  $re->bindParam(":eu",$eu,PDO::PARAM_STR);
  $re->execute();  
  $mostra=$re->fetch(PDO::FETCH_OBJ);
  $contar=$re->rowCount();
  if($contar>0)
  {
    if($mostra->resposta=="ok")
  {
    
  echo "<div class='alert alert-success'>".$mostra->receptor." aceitou o seu convite<br/>
  <a href='jogo.php'>Jogar</a></div>";
  }
  }
  else
  {
    echo "<div class='alert alert-info'>sem respostas</div>";
  }
  
  
}
catch(PDOException $e)
{
    echo $e;
}

?>