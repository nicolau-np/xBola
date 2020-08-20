<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<div class="container">
<div class="row">

<div class="col-md-12">
<h4>Regista-se ja</h4>
<hr />
<?php 
require_once("../config/conn.php");

if(isset($_POST['sv']))
{
    $nome=$_POST['nome'];
    $senha=$_POST['senha'];
    $sala=$_POST['cbsala'];
    $estado="ON";
    $titulo="Jogador";
    $obj="x";

        $sql="select *from jogadores where nome=:nome";
        try{
           $re=$con->prepare($sql);
           $re->bindParam(":nome",$nome,PDO::PARAM_STR);
           $re->execute(); 
           $contar=$re->rowCount();
           if($contar>0)
           {
            echo("<div class='alert alert-danger'>Nome ja existente!!</div>"); 
           }
           else
           {
    $sql="insert into jogadores (nome,senha,estado,titulo,sala) values(:nome,:senha,:estado,:titulo,:sala)";
    try
    {
      $re=$con->prepare($sql);
      $re->bindParam(":nome",$nome,PDO::PARAM_STR);
       $re->bindParam(":senha",$senha,PDO::PARAM_STR);
        $re->bindParam(":estado",$estado,PDO::PARAM_STR);
         $re->bindParam(":titulo",$titulo,PDO::PARAM_STR);
          $re->bindParam(":sala",$sala,PDO::PARAM_STR);
      $re->execute();  
      
      $sql1="insert into tbl_user (nome,senha,estado,titulo) values(:nome,:senha,:estado,:titulo)";
      $re=$con->prepare($sql1);
      $re->bindParam(":nome",$nome,PDO::PARAM_STR);
       $re->bindParam(":senha",$senha,PDO::PARAM_STR);
        $re->bindParam(":estado",$estado,PDO::PARAM_STR);
         $re->bindParam(":titulo",$titulo,PDO::PARAM_STR);
      $re->execute(); 
      
      
      $sql="insert into convites (nome_jogador1,objecto1) values(:nome,:obj)";
    try
    {
      $re=$con->prepare($sql);
      $re->bindParam(":nome",$nome,PDO::PARAM_STR);
       $re->bindParam(":obj",$obj,PDO::PARAM_STR);

      $re->execute(); 
      echo"cadastrado com sucesso";
      }
      catch(PDOException $e)
      {
        
      }
    }
    catch(PDOException $e)
    {
        echo $e;
    }
           }
           
           
        }
        catch(PDOExeception $e)
        {
            echo $e;
        }
        
        
        
  



     
    }
    ?>    
   



<form name='form1' action='cad.php' method='POST'>
<div class="form-group">
<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome de usuario" required/>
<br />
<input type="text" class="form-control" id="senha" name="senha" placeholder="Senha de usuario" required/>
<br />
<select size="1" name="cbsala" class="form-control" required>
<option value="">Escolha a sala</option>
	<option value="Sala 1">Sala 1</option>
	<option value="Sala 2">Sala 2</option>
	<option value="Sala 3">Sala 3</option>
	<option value="Sala 4">Sala 4</option>
</select>
<br />
<input type="submit" value="Salvar" name='sv' class="btn btn-success"/>
</div>


</form>



</div>

</div></div>

</body>
</html>
