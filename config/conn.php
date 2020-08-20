
<?php 

try
{
$con=new PDO('mysql:host=localhost;dbname=2019xBola','root','');
$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo'ERRo'.$e->getMessage();
}



?>
