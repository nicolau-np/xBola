<?php
ob_start();
session_start();
 include("../config/conn.php");
$convidado=$_SESSION['convidado'];
$eu=$_SESSION['nomeS'];
$o="o";

    
    //tabela jogada
    $sql="update convites set nome_jogador2=:convidado, objecto2=:o where nome_jogador1=:eu";
try
{
  $re=$con->prepare($sql);
    $re->bindParam(":convidado",$convidado,PDO::PARAM_STR);
    $re->bindParam(":o",$o,PDO::PARAM_STR);
     $re->bindParam(":eu",$eu,PDO::PARAM_STR);
    $re->execute();
  
  //jogada
  $v="x";
      $sql="insert into jogada (ves,jogador1,jogador2) values(:v,:j1,:j2)";
try
{
  $re=$con->prepare($sql);
    $re->bindParam(":v",$v,PDO::PARAM_STR);
    $re->bindParam(":j1",$eu,PDO::PARAM_STR);
    $re->bindParam(":j2",$convidado,PDO::PARAM_STR);
    $re->execute();
  
   $sql="select *from jogada where ves=:v and jogador1=:j1 and jogador2=:j2";
try
{
  $re=$con->prepare($sql);
    $re->bindParam(":v",$v,PDO::PARAM_STR);
    $re->bindParam(":j1",$eu,PDO::PARAM_STR);
    $re->bindParam(":j2",$convidado,PDO::PARAM_STR);
    $re->execute();
  $mostra=$re->fetch(PDO::FETCH_OBJ);
  $id_jogada=$mostra->id_jogada;
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
$_SESSION['id_jogada']=$id_jogada;
$_SESSION['convidado']=$convidado;
header("location:jogo.php");
?>

