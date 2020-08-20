<?php
ob_start();
session_start();
include("../config/conn.php");
$ele=$_GET['emissor'];
$eu=$_SESSION['nomeS'];
$resposta="ok";

$co="select *from message where emissor=:ele";
$exe=$con->prepare($co);
$exe->bindParam(":ele",$ele,PDO::PARAM_STR);
$exe->execute();
$mostra=$exe->fetch(PDO::FETCH_OBJ);
if($mostra->resposta=="ok")
{
  echo"<script>
  window.location.href='home.php?nome=$ele';
  </script>";    
}
else
{
 $sql="update message set resposta=:rep where receptor=:eu";
try
{
  $re=$con->prepare($sql);
  $re->bindParam(":eu",$eu,PDO::PARAM_STR);
  $re->bindParam(":rep",$resposta,PDO::PARAM_STR);
  $re->execute(); 
  echo"jogar?<br/>";
  $sql="select *from jogada where jogador1=:ele and jogador2=:eu";
try
{
  $re=$con->prepare($sql);
    $re->bindParam(":ele",$ele,PDO::PARAM_STR);
    $re->bindParam(":eu",$eu,PDO::PARAM_STR);
    $re->execute();
  $mostra=$re->fetch(PDO::FETCH_OBJ);
  $id_jogada=$mostra->id_jogada;
  
$_SESSION['id_jogada']=$id_jogada;
  
    echo"<script>
  window.location.href='jogo.php';
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