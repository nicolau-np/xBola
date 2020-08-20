<?php 
ob_start();
session_start();
include("../config/conn.php");
$eu=$_SESSION['nomeS'];
$id_jogada=$_SESSION['id_jogada'];
if(!isset($_SESSION['nomeS']) && (!isset($_SESSION['senhaS'])))
{
    header("location:..entrar.php?acao=negado");exit;
}
?>

<!Doctype html>
<html>
<head><title>xBola</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script type='text/javascript' src='assets/js/jquery-1.5.2.js'></script>
<script>

function botao(){
$.ajax({
		type:"POST",
		url:"requer.php",
		dataType:"html",	
		success: function(dados){
	$(".panel-body").text('')
	.append(dados);},})
	
	}
	setInterval("botao()", 1500);
</script>
<style>
#t{
  font-family:'Showcard Gothic';
  color:#fff;  
}
#z
{
font-family:'Arial Narrow';
 font-size: 16px;   
}
#topo{
    background-color:#c0c0c0;
     
      
}
#joker{
    font-family: 'Comic Sans MS';
    font-size: 17px;
    font-weight: bold;
}
#vx
{
    font-family:'Arial Narrow';
 font-size: 16px; 
}
</style>
</head>
<body>
<div class="container">
<div class="row" id="topo">
<div class="col-md-8" id="t"><h2>::xBola</h2>
<input type="hidden" name="txthora" id="txthora"/>
</div>
<div class="col-md-4" id="z">
<?php echo "<h2>".$_SESSION['nomeS']."</h2>";?>
<h4><a href="termina.php">Abandonar</a></h4>
</div>
</div>
<?php 
$sql="select *from jogada where id_jogada=:id";
try
{
  $re=$con->prepare($sql);
  $re->bindParam(":id",$id_jogada,PDO::PARAM_STR);
  $re->execute();  
  $mostra=$re->fetch(PDO::FETCH_OBJ);
  $jogador1=$mostra->jogador1;
  $jogador2=$mostra->jogador2;
  $objecto1="x";
  $objecto2="o";
  $ves=$mostra->ves;
  $_SESSION['jogador1']=$jogador1;
  $_SESSION['jogador2']=$jogador2;
}
catch(PDOException $e)
{
    echo $e;
}

?>
<br />
<div class="row">
<div class="col-md-9">
<div class="panel panel-success">
<div class="panel-heading" id="vx">JOGO</div>
<div class="panel-body">
<form method="post" enctype="text/plain" action="comece.php">
<div class="alert alert-info">A carrega...</div>
</form>
</div>
</div>
</div>
<div class="col-md-3" id="joker">
<div class="alert alert-info"><?php 
echo $jogador1."-".$objecto1."<br/>".$jogador2."-".$objecto2."<br/> ";?>
</div>
</div>


<div class="statu">

</div>


</div>
</body>

</html>
