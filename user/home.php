<?php 
ob_start();
session_start();
include("../config/conn.php");
if(!isset($_SESSION['nomeS']) && (!isset($_SESSION['senhaS'])))
{
    header("location:../entrar.php?acao=negado");exit;
}

$sala=$_SESSION['sala'];

?>
<!Doctype html>
<html>
<head><title>xBola</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script src="assets/js/jquery-1.5.2.js"></script>
<script>

var h=<?php echo date("H");?>;
var m=<?php echo date("i");?>;
 var s=<?php echo date("s");?>;
function tempo()
{


 if (s<59)
 { s=s+1;}
 
 
 if(s==59)
 {
 m=m+1;
 s=0;}
 
 if(m==59){
 h=h+1;
 m=0;} 
  if(h==24){
	 
h=0;
 m=0;
 s=0;
   h=h+1;}


	$("#txthora").val(h+":"+m+":"+s);
	
	//coloca acoes
      $(".msn").load("ver_message.php");
    $(".reposta").load("resp.php");
 
    
    
  
}
setInterval("tempo()", 1000);
$(function() {
    // Faz a primeira atualização
   tempo();
});


</script>
<style>
#topo
{
    background-color:#c0c0c0;
}
#ti{
 font-family:'Showcard Gothic'; 
 color:#fff;  
}
#cb1
{
    font-family:'Arial Narrow';
    font-size: 16px;
}
#ti2{
font-family:'Arial Narrow';
 font-size: 16px;  
}
#q{
 font-family:'Arial Narrow';
 font-size: 16px;   
}
#bt1{
  font-family:'Arial Narrow';
 font-size: 16px;    
}

.envio{
    font-family:'Comic Sans MS';
    font-size: 13px;
}
.msn{
     font-family:'Comic Sans MS';
     font-size: 13px;
}
.reposta{
    font-family:'Comic Sans MS'; 
    font-size: 13px;
}
#f
{
    font-family:Comic Sans MS ;
    font-size: 20px;
    font-weight: bold;
    color:#c0c0c0;
}
</style>
</head>
<body>
<div class="container">
<div class="row" id="topo">
<div class="col-md-8" id="ti"><h2>::xBola</h2>
<input type="hidden" id="txthora"/></div>
<div class="col-md-4" id="ti2">
<?php echo "<h2>".$_SESSION['nomeS']."</h2>";
$nome=$_SESSION['nomeS'];
echo '<a href="home.php"><h4>Actualizar Sala</a><a name="b"> | </a><a href="mudar.php">Mudar de Sala</a><a name="b"> | </a><a href="logout.php">Sair</h4></a>';
?>
</div>
</div>

<div class="row">
<div class="col-md-12" id="f">
<form  method='POST' action='home.php' name='form5'  role='form'>
<hr />
<?php 
if(isset($_POST['bt8']))
{
    $come=$_POST['su'];
$sql1="select *from sugestoes where nome=:nome";
$re=$con->prepare($sql1);
   $re->bindParam(":nome",$nome,PDO::PARAM_STR);
   $re->execute();
   $contar=$re->rowCount();
   if($contar>0)
   {
  
   }
   else
   {
    $sql40="INSERT INTO sugestoes(nome,sugestao) VALUES(:nome,:sugestao)";
$res=$con->prepare($sql40);
     $res->bindParam(":nome",$nome,PDO::PARAM_STR);
     $res->bindParam(":sugestao",$come,PDO::PARAM_STR); 
     $res->execute(); 
  echo"<div class='alert alert-success'>Obrigado pelo seu comentario...</div>"; 
   }




    
}



$sql1="select *from sugestoes where nome=:nome";
try
{
   $re=$con->prepare($sql1);
   $re->bindParam(":nome",$nome,PDO::PARAM_STR);
   $re->execute();
   $contar=$re->rowCount();
   
}
catch(PDOException $e)
{
    echo $e;
}
if($contar==0)
   {
    echo"
    <div class='form-group'><textarea cols='5' rows='2' maxlength='1000' class='form-control' id='su' name='su' placeholder='Escreva o seu comentario.. Acerca do jogo'></textarea></div>
   
    <input type='submit' class='btn btn-warning' value='comentar' name='bt8'>
    ";
   }

?>
</form>
<hr />
</div>
</div>

<div class="row">
<div class="col-md-6"> 

<form method="POST" action="" name="form1" role="form">
<div class="form-group">
<label for="txtconvidado" id="q"><?php echo $sala;?> quem vai convidar?</label><br/>


<?php 

$atual="on";
$sql="select *from jogadores where nome!=:nome and sala=:sala and actual=:atual";
$re=$con->prepare($sql);
$re->bindParam(":nome",$nome,PDO::PARAM_STR);
$re->bindParam(":sala",$sala,PDO::PARAM_STR);
$re->bindParam(":atual",$atual,PDO::PARAM_STR);
$re->execute();
while ($mostra=$re->fetch(PDO::FETCH_OBJ))
{
 echo "<input type='radio' id='cb1' name='cb1' value='{$mostra->nome}'/> {$mostra->nome}<br/>";
}

?>

</div>
<div class="form-inline"><input type="submit" value="Convidar" class="btn btn-success" id="bt1" name="bt1"/>
</div>
</form>
<br/>
</div>
<div class="col-md-6" id="">

<div class="envio"> 
<?php 
if(isset($_POST['bt1']))
{
include("convidar.php");   
}
?>
</div>

<div class="msn"> 

</div>



<div class="reposta"> 


</div>

</div>

</div>



</div>
</body>

</html>
