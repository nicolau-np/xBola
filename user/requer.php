<?php 
ob_start();
session_start();
include("../config/conn.php");
if(!isset($_SESSION['nomeS']) && (!isset($_SESSION['senhaS'])))
{
    header("location:../entrar.php?acao=negado");exit;
}


$id_jogada=$_SESSION['id_jogada'];
  $jogador1=$_SESSION['jogador1'];
  $jogador2=$_SESSION['jogador2'];
  $nome=$_SESSION['nomeS'];
  $pontos=$_SESSION['pontos'];
  if($nome==$jogador1)
  {
    $obj3="x";
  }
  elseif($nome==$jogador2)
  {
    $obj3="o";
  }
?>
<!Doctype html>
<html>
<head><title>Jogo do Galo</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script type='text/javascript' src='assets/js/jquery-1.5.2.js'></script>
<script>
$(document).ready(function(){
    $(".vb").attr("disabled","disabled")
   var v=$("#ves").val();
   var o=$("#obj").val();
   if(v==o)
   {
    $(".btn").removeAttr("disabled");
    if(($("#bt1").val()!=""))
    {
      $("#bt1").attr("disabled","disabled");  
    }
    if(($("#bt2").val()!=""))
    {
      $("#bt2").attr("disabled","disabled");  
    }
     if(($("#bt3").val()!=""))
    {
      $("#bt3").attr("disabled","disabled");  
    }
     if(($("#bt4").val()!=""))
    {
      $("#bt4").attr("disabled","disabled");  
    }
     if(($("#bt5").val()!=""))
    {
      $("#bt5").attr("disabled","disabled");  
    }
     if(($("#bt6").val()!=""))
    {
      $("#bt6").attr("disabled","disabled");  
    }
     if(($("#bt7").val()!=""))
    {
      $("#bt7").attr("disabled","disabled");  
    }
     if(($("#bt8").val()!=""))
    {
      $("#bt8").attr("disabled","disabled");  
    }
     if(($("#bt9").val()!=""))
    {
      $("#bt9").attr("disabled","disabled");  
    }
    
   }
   else
   {
    $(".btn").attr("disabled","disabled");
   }
    
    
    
    //cliques sobre o galo
   $("#bt1").click(function(){
    var a=1;
    var b=$("#ves").val();
    $(".cli").load("folha.php?nu="+a,'& ves='+b);
   });
   $("#bt2").click(function(){
    var a=2;
    var b=$("#ves").val();
    $(".cli").load("folha.php?nu="+a,'& ves='+b);
   });
   $("#bt3").click(function(){
    var a=3;
    var b=$("#ves").val();
    $(".cli").load("folha.php?nu="+a,'& ves='+b);
   });
   $("#bt4").click(function(){
    var a=4;
    var b=$("#ves").val();
    $(".cli").load("folha.php?nu="+a,'& ves='+b);
   });
   $("#bt5").click(function(){
    var a=5;
    var b=$("#ves").val();
    $(".cli").load("folha.php?nu="+a,'& ves='+b);
   });
   $("#bt6").click(function(){
    var a=6;
    var b=$("#ves").val();
    $(".cli").load("folha.php?nu="+a,'& ves='+b);
   });
   $("#bt7").click(function(){
    var a=7;
    var b=$("#ves").val();
    $(".cli").load("folha.php?nu="+a,'& ves='+b);
   });
   $("#bt8").click(function(){
    var a=8;
    var b=$("#ves").val();
    $(".cli").load("folha.php?nu="+a,'& ves='+b);
   });
   $("#bt9").click(function(){
    var a=9;
    var b=$("#ves").val();
    $(".cli").load("folha.php?nu="+a,'& ves='+b);
   });
   
   //verificacao de vencedor
   //estrair valores
   var b1=$("#bt1").val();
   var b2=$("#bt2").val();
   var b3=$("#bt3").val();
   var b4=$("#bt4").val();
   var b5=$("#bt5").val();
   var b6=$("#bt6").val();
   var b7=$("#bt7").val();
   var b8=$("#bt8").val();
   var b9=$("#bt9").val();
   
   //verificar
   //para o x
   //linhas horizontais
   
   if((b1=="x")&&(b2=="x")&&(b3=="x"))
   {
    $("#je").val("x");
    var je=$("#je").val();
    var obj=$("#obj").val();
    if(je==obj)
    {
      $("#vencedor").text("PARABENS VOCE GANHOU!!");
       $(".ig").load("foto_ganho.php");    
    }
    else
    {
       $("#vencedor").text("VOCE PERDEU!!");  
       $(".ig").load("foto_perde.php"); 
    }
    $("#bt1").css('background','yellow');
    $("#bt2").css('background','yellow');
    $("#bt3").css('background','yellow');
    $(".btn").attr("disabled","disabled");
    
   }
    else if((b4=="x")&&(b5=="x")&&(b6=="x"))
   {
     $("#je").val("x");
    var je=$("#je").val();
    var obj=$("#obj").val();
    if(je==obj)
    {
      $("#vencedor").text("PARABENS VOCE GANHOU!!");
       $(".ig").load("foto_ganho.php");    
    }
    else
    {
       $("#vencedor").text("VOCE PERDEU!!");  
       $(".ig").load("foto_perde.php"); 
    }
      $("#bt4").css('background','yellow');
    $("#bt5").css('background','yellow');
    $("#bt6").css('background','yellow');
    $(".btn").attr("disabled","disabled");
   }
    else if((b7=="x")&&(b8=="x")&&(b9=="x"))
   {
     $("#je").val("x");
    var je=$("#je").val();
    var obj=$("#obj").val();
    if(je==obj)
    {
      $("#vencedor").text("PARABENS VOCE GANHOU!!");
       $(".ig").load("foto_ganho.php");    
    }
    else
    {
       $("#vencedor").text("VOCE PERDEU!!"); 
       $(".ig").load("foto_perde.php");  
    }
      $("#bt7").css('background','yellow');
    $("#bt8").css('background','yellow');
    $("#bt9").css('background','yellow');
    $(".btn").attr("disabled","disabled");
   }
   //verticais
    else if((b1=="x")&&(b4=="x")&&(b7=="x"))
   {
     $("#je").val("x");
    var je=$("#je").val();
    var obj=$("#obj").val();
    if(je==obj)
    {
      $("#vencedor").text("PARABENS VOCE GANHOU!!");
       $(".ig").load("foto_ganho.php");    
    }
    else
    {
       $("#vencedor").text("VOCE PERDEU!!");
       $(".ig").load("foto_perde.php");    
    }
      $("#bt1").css('background','yellow');
    $("#bt4").css('background','yellow');
    $("#bt7").css('background','yellow');
    $(".btn").attr("disabled","disabled");
   }
    else if((b2=="x")&&(b5=="x")&&(b8=="x"))
   {
     $("#je").val("x");
    var je=$("#je").val();
    var obj=$("#obj").val();
    if(je==obj)
    {
      $("#vencedor").text("PARABENS VOCE GANHOU!!");
       $(".ig").load("foto_ganho.php");    
    }
    else
    {
       $("#vencedor").text("VOCE PERDEU!!");  
       $(".ig").load("foto_perde.php"); 
    }
      $("#bt2").css('background','yellow');
    $("#bt5").css('background','yellow');
    $("#bt8").css('background','yellow');
    $(".btn").attr("disabled","disabled");
   }
    else if((b3=="x")&&(b6=="x")&&(b9=="x"))
   {
     $("#je").val("x");
    var je=$("#je").val();
    var obj=$("#obj").val();
    if(je==obj)
    {
      $("#vencedor").text("PARABENS VOCE GANHOU!!");
       $(".ig").load("foto_ganho.php");    
    }
    else
    {
       $("#vencedor").text("VOCE PERDEU!!"); 
       $(".ig").load("foto_perde.php");  
    }
      $("#bt3").css('background','yellow');
    $("#bt6").css('background','yellow');
    $("#bt9").css('background','yellow');
    $(".btn").attr("disabled","disabled");
   }
   //transversais
     else if((b1=="x")&&(b5=="x")&&(b9=="x"))
   {
     $("#je").val("x");
    var je=$("#je").val();
    var obj=$("#obj").val();
    if(je==obj)
    {
      $("#vencedor").text("PARABENS VOCE GANHOU!!"); 
       $(".ig").load("foto_ganho.php");   
    }
    else
    {
       $("#vencedor").text("VOCE PERDEU!!"); 
       $(".ig").load("foto_perde.php");  
    }
      $("#bt1").css('background','yellow');
    $("#bt5").css('background','yellow');
    $("#bt9").css('background','yellow');
    $(".btn").attr("disabled","disabled");
  
   }
    else if((b3=="x")&&(b5=="x")&&(b7=="x"))
   {
     $("#je").val("x");
    var je=$("#je").val();
    var obj=$("#obj").val();
    if(je==obj)
    {
      $("#vencedor").text("PARABENS VOCE GANHOU!!");
       $(".ig").load("foto_ganho.php");    
    }
    else
    {
       $("#vencedor").text("VOCE PERDEU!!");  
       $(".ig").load("foto_perde.php"); 
    }
      $("#bt3").css('background','yellow');
    $("#bt5").css('background','yellow');
    $("#bt7").css('background','yellow');
    $(".btn").attr("disabled","disabled");
   
   }
   
   //para o
    //linhas horizontais
   
   else if((b1=="o")&&(b2=="o")&&(b3=="o"))
   {
     $("#je").val("o");
    var je=$("#je").val();
    var obj=$("#obj").val();
    if(je==obj)
    {
      $("#vencedor").text("PARABENS VOCE GANHOU!!");
       $(".ig").load("foto_ganho.php");    
    }
    else
    {
       $("#vencedor").text("VOCE PERDEU!!");  
       $(".ig").load("foto_perde.php"); 
    }
       $("#bt1").css('background','yellow');
    $("#bt2").css('background','yellow');
    $("#bt3").css('background','yellow');
    $(".btn").attr("disabled","disabled");
   }
    else if((b4=="o")&&(b5=="o")&&(b6=="o"))
   {
     $("#je").val("o");
   var je=$("#je").val();
    var obj=$("#obj").val();
    if(je==obj)
    {
      $("#vencedor").text("PARABENS VOCE GANHOU!!"); 
       $(".ig").load("foto_ganho.php");   
    }
    else
    {
       $("#vencedor").text("VOCE PERDEU!!");
       $(".ig").load("foto_perde.php");   
    }
       $("#bt4").css('background','yellow');
    $("#bt5").css('background','yellow');
    $("#bt6").css('background','yellow');
    $(".btn").attr("disabled","disabled");
   }
    else if((b7=="o")&&(b8=="o")&&(b9=="o"))
   {
     $("#je").val("o");
    var je=$("#je").val();
    var obj=$("#obj").val();
    if(je==obj)
    {
      $("#vencedor").text("PARABENS VOCE GANHOU!!");
       $(".ig").load("foto_ganho.php");    
    }
    else
    {
       $("#vencedor").text("VOCE PERDEU!!"); 
       $(".ig").load("foto_perde.php");  
    }
       $("#bt7").css('background','yellow');
    $("#bt8").css('background','yellow');
    $("#bt9").css('background','yellow');
    $(".btn").attr("disabled","disabled");
   }
   //verticais
    else if((b1=="o")&&(b4=="o")&&(b7=="o"))
   {
     $("#je").val("o");
   var je=$("#je").val();
    var obj=$("#obj").val();
    if(je==obj)
    {
      $("#vencedor").text("PARABENS VOCE GANHOU!!"); 
       $(".ig").load("foto_ganho.php");   
    }
    else
    {
       $("#vencedor").text("VOCE PERDEU!!"); 
       $(".ig").load("foto_perde.php");  
    }
       $("#bt1").css('background','yellow');
    $("#bt4").css('background','yellow');
    $("#bt7").css('background','yellow');
    $(".btn").attr("disabled","disabled");
   }
    else if((b2=="o")&&(b5=="o")&&(b8=="o"))
   {
     $("#je").val("o");
    var obj=$("#obj").val();
    if(je==obj)
    {
      $("#vencedor").text("PARABENS VOCE GANHOU!!"); 
       $(".ig").load("foto_ganho.php");   
    }
    else
    {
       $("#vencedor").text("VOCE PERDEU!!");
       $(".ig").load("foto_perde.php");   
    }
       $("#bt2").css('background','yellow');
    $("#bt5").css('background','yellow');
    $("#bt8").css('background','yellow');
     $(".btn").attr("disabled","disabled");
   
   }
    else if((b3=="o")&&(b6=="o")&&(b9=="o"))
   {
     $("#je").val("o");
    var je=$("#je").val();
    var obj=$("#obj").val();
    if(je==obj)
    {
      $("#vencedor").text("PARABENS VOCE GANHOU!!");
       $(".ig").load("foto_ganho.php");   
    }
    else
    {
       $("#vencedor").text("VOCE PERDEU!!"); 
       $(".ig").load("foto_perde.php");  
    }
     $("#bt3").css('background','yellow');
    $("#bt6").css('background','yellow');
    $("#bt9").css('background','yellow');
    $(".btn").attr("disabled","disabled");
   }
   //transversais
     else if((b1=="o")&&(b5=="o")&&(b9=="o"))
   {
     $("#je").val("o");
   var je=$("#je").val();
    var obj=$("#obj").val();
    if(je==obj)
    {
      $("#vencedor").text("PARABENS VOCE GANHOU!!"); 
       $(".ig").load("foto_ganho.php");  
    }
    else
    {
       $("#vencedor").text("VOCE PERDEU!!");  
       $(".ig").load("foto_perde.php"); 
    }
     $("#bt1").css('background','yellow');
    $("#bt5").css('background','yellow');
    $("#bt9").css('background','yellow');
    $(".btn").attr("disabled","disabled");
   }
    else if((b3=="o")&&(b5=="o")&&(b7=="o"))
   {
     $("#je").val("o");
   var je=$("#je").val();
    var obj=$("#obj").val();
    if(je==obj)
    {
      $("#vencedor").text("PARABENS VOCE GANHOU!!");
       $(".ig").load("foto_ganho.php");   
    }
    
    else
    {
       $("#vencedor").text("VOCE PERDEU!!"); 
       $(".ig").load("foto_perde.php"); 
    }
     $("#bt3").css('background','yellow');
    $("#bt5").css('background','yellow');
    $("#bt7").css('background','yellow');
    $(".btn").attr("disabled","disabled");
   }
  
   //empate
 else if((b1!="")&&(b2!="")&&(b3!="")&&(b4!="")&&(b5!="")&&(b6!="")&&(b7!="")&&(b8!="")&&(b9!="")&&($("#je").val()==""))
  {
     $("#vencedor").text("GAME OVER");
  } 
  
   
});


</script>
<style>
.btn
{
    width: 100%;
    height: 55px;
    font-family: 'Aharoni';
    font-size: 35px;
    font-weight: bold;
    border: #fff 0px solid;
    color:#000;
}
#tb{
   width: 100%; 
   border: #000 0px solid;
   background-color: #c0c0c0;
}
#vencedor{
    font-family:'Arial Narrow';
    font-weight: bold;
    font-size: 19px;
    
}
#vcf{
    font-family: 'Arial Narrow';
    font-size: 16px;
}
#ves{
    font-family: 'Arial Narrow';
    font-size: 16px;
    font-weight: bold;
    border: #000 0px solid;
    text-align: center;
}
#ne{
    font-family:'Arial Narrow';
    font-size: 16px;
}
.xc{
    width: 33.3%;
}

</style>
</head>
<body>


<form method="post" enctype="text/plain" action="comece.php">
<?php 
$sql="select *from valores where id_jogada=:id";
$re=$con->prepare($sql);
$re->bindParam(":id",$id_jogada,PDO::PARAM_STR);
$re->execute();
while ($mostra=$re->fetch(PDO::FETCH_OBJ))
{
?>
<table class="table table-bordered" id="tb">
<tr>
<td class="xc"><input type="button" value="<?php echo $mostra->b1; ?>" class="btn btn-primary" id="bt1" /></td>
<td class="xc"><input type="button" value="<?php echo $mostra->b2; ?>" class="btn btn-primary" id="bt2" /></td>
<td class="xc"><input type="button" value="<?php echo $mostra->b3; ?>" class="btn btn-primary" id="bt3" /></td>

</tr>



<tr>
<td class="xc"><input type="button" value="<?php echo $mostra->b4; ?>" class="btn btn-primary" id="bt4" /></td>
<td class="xc"><input type="button" value="<?php echo $mostra->b5; ?>" class="btn btn-primary" id="bt5" /></td>
<td class="xc"><input type="button" value="<?php echo $mostra->b6; ?>" class="btn btn-primary" id="bt6" /></td>

</tr>


<tr>
<td class="xc"><input type="button" value="<?php echo $mostra->b7; ?>" class="btn btn-primary" id="bt7" /></td>
<td class="xc"><input type="button" value="<?php echo $mostra->b8; ?>" class="btn btn-primary" id="bt8" /></td>
<td class="xc"><input type="button" value="<?php echo $mostra->b9; ?>" class="btn btn-primary" id="bt9" /></td>
</tr>

</table>
<?php }
?>
<?php 


$sql="select *from jogada where id_jogada=:id";
try
{
  $re=$con->prepare($sql);
  $re->bindParam(":id",$id_jogada,PDO::PARAM_STR);
  $re->execute(); 
  $mostra=$re->fetch(PDO::FETCH_OBJ);
  $contar=$re->rowCount();
  if($contar>0)
  {
   $ves=$mostra->ves; 
  }
  else
  {
    echo"<div class='alert alert-danger' id='ne'>Jogo Terminado    <a href='termina.php'>Sair</a></div>";
  }
  
}
catch(PDOException $e)
{
    echo $e;
}

?>
<div class="ig"></div>
<div class="alert alert-warning" id="vencedor"></div>
<label id="vcf">Vez:</label>
<input type="text" size="1" name="ves" id="ves" value="<?php if($contar>0){echo $ves;}?>" class="vb"/>
<input type="hidden" name="obj" id="obj" value="<?php echo $obj3;?>" class="vb"/>
<input type="hidden" name="je" id="je" value="" class="je"/>
</form>

<div class="cli">

</div>
</div>
<div class="statu">

</div>


</div>
</body>

</html>
