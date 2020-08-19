<?php
$user='root';
$password='';
$db='oxemstudiodb';
$host='localhost';
$dsn='mysql:host='.$host.';dbname='.$db;
$pdo=new PDO($dsn, $user, "");

$argumentColumn = $_GET['argumentColumn'];
$argumentValue = $_GET['argumentValue'];
$sql="UPDATE categories SET argumentColumn, argumentValue";

$query=$pdo->prepare($sql);

if(query->$query->execute()){
	echo "{success:true, error:false}"
	
}else{
	echo "{success:false, error:true}"
	
};
?>