<?php
$user='root';
$password='';
$db='oxemstudiodb';
$host='localhost';
$dsn='mysql:host='.$host.';dbname='.$db;
$pdo=new PDO($dsn, $user, "");
$argumentId = $_GET['argumentId'];

$sql="select * from oxemdb where categoryId = argumentId";

$query=$pdo->prepare($sql);


if($query->execute()){
	echo "{success:true, error:false}"
	
}else{
	echo "{success:false, error:true}"
	
};
?>