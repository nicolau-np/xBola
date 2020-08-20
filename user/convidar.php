<?php
$convidado=$_POST['cb1'];
$eu=$_SESSION['nomeS'];
$o="o";


//ver se já existe
$co="select *from jogada where jogador2=:jogador2";
$exe=$con->prepare($co);
$exe->bindParam(":jogador2",$convidado,PDO::PARAM_STR);
$exe->execute();
    $contar=$exe->rowCount();
    if($contar>0)
    {
       echo "<div class='alert alert-danger'>".$convidado." ja foi convido(a)! convide outro amigo</div>"; 
    }
    else
    {
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
  
  
  
  //tabela valores
   $sql="insert into valores (id_jogada) values(:id)";
try
{
  $re=$con->prepare($sql);
    $re->bindParam(":id",$id_jogada,PDO::PARAM_STR);
    $re->execute();
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
  
}
catch(PDOException $e)
{
    echo $e;
}
$_SESSION['id_jogada']=$id_jogada;


$eu=$_SESSION['nomeS'];
$tu=$_POST['cb1'];
$_SESSION['convidado']=$_POST['cb1'];

$sql="insert into message(emissor,receptor,descricao) values(:eu,:tu,:i)";
try
{
  $re=$con->prepare($sql);
  $re->bindParam(":eu",$eu,PDO::PARAM_STR);
  $re->bindParam(":tu",$tu,PDO::PARAM_STR);
  $re->bindParam(":i",$id_jogada,PDO::PARAM_STR);
  $re->execute();  
  echo "<div class='alert alert-success'>Convite enviado com sucesso</div>";
}
catch(PDOException $e)
{
    echo $e;
}

}
?>   
    
   