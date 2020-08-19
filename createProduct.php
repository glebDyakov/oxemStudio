<?php

$user='root';
$password='';
$db='oxemstudiodb';
$host='localhost';
$dsn='mysql:host='.$host.';dbname='.$db;
$pdo=new PDO($dsn, $user, "");

$argumentName = $_GET['argumentName'];
$argumentDescription = (int)$_GET['argumentDescription'];
//$argumentDateOfCreation = $_GET['argumentDateOfCreation'];
$argumentPrice = (int)$_GET['argumentPrice'];
$argumentRemainder = (int)$_GET['argumentRemainder'];
$argumentCategories = $_GET['argumentCategories'];
$argumentExternalId = (int)$_GET['argumentExternalId'];


$sql="INSERT INTO oxemdb (name,description,dateOfCreation,price,remainder,categories,externalID) VALUES (argumentName,argumentDescription,2,argumentPrice,argumentRemainder,argumentCategories,argumentExternalId)";


$query=$pdo->prepare($sql);
$query->execute();
echo `{success:true, error:'', code:0, id:${argumentId}}`;