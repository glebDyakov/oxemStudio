<?php

$user='root';
$password='';
$db='oxemstudiodb';
$host='localhost';
$dsn='mysql:host='.$host.';dbname='.$db;
$pdo=new PDO($dsn, $user, "");

//$argumentId = $_GET['argumentId'];
$argumentName = $_GET['argumentName'];
$argumentParentId= $_GET['argumentParentId'];
$argumentExternalId= $_GET['argumentExternalId'];


$sql="INSERT INTO categories (name,parentId,externalId) VALUES ($argumentName,$argumentParentId,$argumentExternalId)";

$query=$pdo->prepare($sql);


if($query->execute()){
	echo "{success:true, error:false}";
}else{
	echo "{success:false, error:true}";
};

