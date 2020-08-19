<?php
$user='root';
$password='';
$db='oxemstudiodb';
$host='localhost';
$dsn='mysql:host='.$host.';dbname='.$db;
$pdo=new PDO($dsn, $user, "");

$argumentId = $_GET['argumentId'];

$sql="delete * from categories where categoryId = argumentid";

$query=$pdo->prepare($sql);
$query->execute();

if(query->execute()){
	echo "{success:true, error:false}"
	
}else{
	echo "{success:false, error:true}"
	
};
?>