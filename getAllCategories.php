<?php
$user='root';
$password='';
$db='oxemstudiodb';
$host='localhost';
$dsn='mysql:host='.$host.';dbname='.$db;
$pdo=new PDO($dsn, $user, "");

$sql="Select * from categories";

$queryqwe=$pdo->prepare($sql);


if($queryqwe->execute()){
	echo "{success:true, error:false}"
	
}else{
	echo "{success:false, error:true}"
	
};
?>