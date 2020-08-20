<?php
ob_start();
session_start();
include("../config/conn.php");
if(!isset($_SESSION['nomeS']) && (!isset($_SESSION['senhaS'])))
{
    header("location:../entrar.php?acao=negado");exit;
}


$nu=$_GET['nu'];
$id_jogada=$_SESSION['id_jogada'];
$obj=$_GET['ves'];

//b1
if($nu=="1")
{
 $sql="update valores set b1=:obj where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":obj",$obj,PDO::PARAM_STR);
   $re->bindParam(":id",$id_jogada,PDO::PARAM_STR);
   $re->execute();
   
   //tabela jogada
   if($obj=="x")
   {
    $obj2="o";
   }
   elseif($obj=="o")
   {
    $obj2="x";
   }
    $sql="update jogada set ves=:ves where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":ves",$obj2,PDO::PARAM_STR);
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
 
 
 //b2
 elseif($nu=="2")
{
 $sql="update valores set b2=:obj where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":obj",$obj,PDO::PARAM_STR);
   $re->bindParam(":id",$id_jogada,PDO::PARAM_STR);
   $re->execute();
   
   //tabela jogada
   if($obj=="x")
   {
    $obj2="o";
   }
   elseif($obj=="o")
   {
    $obj2="x";
   }
    $sql="update jogada set ves=:ves where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":ves",$obj2,PDO::PARAM_STR);
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


//b3
 elseif($nu=="3")
{
 $sql="update valores set b3=:obj where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":obj",$obj,PDO::PARAM_STR);
   $re->bindParam(":id",$id_jogada,PDO::PARAM_STR);
   $re->execute();
   
   //tabela jogada
   if($obj=="x")
   {
    $obj2="o";
   }
   elseif($obj=="o")
   {
    $obj2="x";
   }
    $sql="update jogada set ves=:ves where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":ves",$obj2,PDO::PARAM_STR);
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


//b4
 elseif($nu=="4")
{
 $sql="update valores set b4=:obj where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":obj",$obj,PDO::PARAM_STR);
   $re->bindParam(":id",$id_jogada,PDO::PARAM_STR);
   $re->execute();
   
   //tabela jogada
   if($obj=="x")
   {
    $obj2="o";
   }
   elseif($obj=="o")
   {
    $obj2="x";
   }
    $sql="update jogada set ves=:ves where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":ves",$obj2,PDO::PARAM_STR);
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


//b5
 elseif($nu=="5")
{
 $sql="update valores set b5=:obj where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":obj",$obj,PDO::PARAM_STR);
   $re->bindParam(":id",$id_jogada,PDO::PARAM_STR);
   $re->execute();
   
   //tabela jogada
   if($obj=="x")
   {
    $obj2="o";
   }
   elseif($obj=="o")
   {
    $obj2="x";
   }
    $sql="update jogada set ves=:ves where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":ves",$obj2,PDO::PARAM_STR);
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

//b6
 elseif($nu=="6")
{
 $sql="update valores set b6=:obj where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":obj",$obj,PDO::PARAM_STR);
   $re->bindParam(":id",$id_jogada,PDO::PARAM_STR);
   $re->execute();
   
   //tabela jogada
   if($obj=="x")
   {
    $obj2="o";
   }
   elseif($obj=="o")
   {
    $obj2="x";
   }
    $sql="update jogada set ves=:ves where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":ves",$obj2,PDO::PARAM_STR);
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

//b7
 elseif($nu=="7")
{
 $sql="update valores set b7=:obj where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":obj",$obj,PDO::PARAM_STR);
   $re->bindParam(":id",$id_jogada,PDO::PARAM_STR);
   $re->execute();
   
   //tabela jogada
   if($obj=="x")
   {
    $obj2="o";
   }
   elseif($obj=="o")
   {
    $obj2="x";
   }
    $sql="update jogada set ves=:ves where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":ves",$obj2,PDO::PARAM_STR);
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

//b8
 elseif($nu=="8")
{
 $sql="update valores set b8=:obj where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":obj",$obj,PDO::PARAM_STR);
   $re->bindParam(":id",$id_jogada,PDO::PARAM_STR);
   $re->execute();
   
   //tabela jogada
   if($obj=="x")
   {
    $obj2="o";
   }
   elseif($obj=="o")
   {
    $obj2="x";
   }
    $sql="update jogada set ves=:ves where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":ves",$obj2,PDO::PARAM_STR);
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

//b9
 elseif($nu=="9")
{
 $sql="update valores set b9=:obj where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":obj",$obj,PDO::PARAM_STR);
   $re->bindParam(":id",$id_jogada,PDO::PARAM_STR);
   $re->execute();
   
   //tabela jogada
   if($obj=="x")
   {
    $obj2="o";
   }
   elseif($obj=="o")
   {
    $obj2="x";
   }
    $sql="update jogada set ves=:ves where id_jogada=:id";   
 try
 {
   $re=$con->prepare($sql);
   $re->bindParam(":ves",$obj2,PDO::PARAM_STR);
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
?>