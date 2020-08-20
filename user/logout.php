<?php
ob_start();
session_start();
include("../config/conn.php");
//muda para logado
$nome=$_SESSION['nomeS'];
$atual="of";
$sql="update jogadores set actual=:atual where nome=:nome";
try
{
  $re=$con->prepare($sql);
  $re->bindParam(":atual",$atual,PDO::PARAM_STR);
  $re->bindParam(":nome",$nome,PDO::PARAM_STR);
  $re->execute();  
}
catch(PDOException $e)
{
   echo $e; 
}



session_unset();
session_destroy();
header("location:../index.php");

?>