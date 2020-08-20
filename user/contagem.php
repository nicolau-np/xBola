<!Doctype html>
<html>
<head><title>Jogo do Galo</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script src="assets/js/jquery-1.5.2.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<?php

/**
 * @author lolkittens
 * @copyright 2016
 */
include("../config/conn.php");
$sql="select *from jogadores";
try
{
  $re=$con->prepare($sql);
  $re->execute();
  $contar=$re->rowCount();
  echo"<h1>USUARIOS: </h1>";
  echo("<h1>".$contar."</h1><br/>");  
}
catch(PDOException $e)
{
    echo $e;
}


$sql="select *from sugestoes order by id_suge desc";
try
{
  $re=$con->prepare($sql);
  $re->execute();
  $contar=$re->rowCount();
  
  
  echo"<h1>COMENTARIOS: $contar</h1><br/>";
  while($mostra=$re->fetch(PDO::FETCH_OBJ))
  {
    echo("<div class='alert alert-info'><label>".$mostra->nome."</label><br/>
    ".$mostra->sugestao."</div>"); 
  }
   
}
catch(PDOException $e)
{
    echo $e;
}
?>
</div>
</div>
</body>
</html>