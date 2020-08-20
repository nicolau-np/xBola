<?php
ob_start();
session_start();
include("../config/conn.php");
if(!isset($_SESSION['nomeS']) && (!isset($_SESSION['senhaS'])))
{
    header("location:..entrar.php?acao=negado");exit;
}

$eu=$_SESSION['nomeS'];

$sql="select *from message where receptor=:eu";
try
{
  $re=$con->prepare($sql);
  $re->bindParam(":eu",$eu,PDO::PARAM_STR);
  $re->execute();  
  $mostra=$re->fetch(PDO::FETCH_OBJ);
  $contar=$re->rowCount();
  if($contar>0)
  {
    
    echo"<div class='alert alert-success'>". $mostra->emissor." convidou voce para jogar<br/>
  <a href='acept.php?emissor=$mostra->emissor'>Aceitar</a>::<a href='nao_acept.php?emissor=$mostra->emissor'>Nao aceitar</a></div>";
  }
  else
  {
    echo "<div class='alert alert-info'>sem convite</a>";
  }
  
}
catch(PDOException $e)
{
    echo $e;
}

?>