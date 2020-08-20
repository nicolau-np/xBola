<?php

/**
 * @author lolkittens
 * @copyright 2016
 */

ob_start();
session_start();
include("../config/conn.php");
$ele=$_GET['emissor'];
$eu=$_SESSION['nomeS'];

$sql="delete from message where receptor=:eu";

  $re=$con->prepare($sql);
  $re->bindParam(":eu",$eu,PDO::PARAM_STR);
  $re->execute(); 
  
 $sql="delete from jogada where jogador2=:eu";

  $re=$con->prepare($sql);
  $re->bindParam(":eu",$eu,PDO::PARAM_STR);
  $re->execute();  
  echo"<script>
  window.location.href='home.php?ele=$ele';
  </script>";

?>