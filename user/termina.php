<?php
ob_start();
session_start();
include("../config/conn.php");
if(!isset($_SESSION['nomeS']) && (!isset($_SESSION['senhaS'])))
{
    header("location:../entrar.php?acao=negado");exit;
}


$id=$_SESSION['id_jogada'];

$sql="delete from jogada where id_jogada=:id";
try
{
  $re=$con->prepare($sql);
  $re->bindParam(":id",$id,PDO::PARAM_STR);
  $re->execute();
  
  
  
  //messagen
  $sql="delete from message where descricao=:id";
try
{
  $re=$con->prepare($sql);
  $re->bindParam(":id",$id,PDO::PARAM_STR);
  $re->execute();
  
  //valores
  $sql="delete from valores where id_jogada=:id";
try
{
  $re=$con->prepare($sql);
  $re->bindParam(":id",$id,PDO::PARAM_STR);
  $re->execute();
  echo"<script>
  window.location.href='home.php';
  </script>" ;
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
catch(PDOException $e)
{
    echo $e;
}


?>