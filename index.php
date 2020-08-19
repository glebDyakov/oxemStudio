<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
﻿<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php
if($_GET[page]===null){
	$_GET[page]=1;
};
if($_GET[order]===null){
	$_GET[order]=asc;
};
$user='root';
$password='';
$db='oxemstudiodb';
$host='localhost';
$dsn='mysql:host='.$host.';dbname='.$db;
$pdo=new PDO($dsn, $user, "");
$myvar=(int)($_GET[page] + 1);

$myvaro=(int)($_GET[page] * 50 - 50);
$myvart=(int)($_GET[page] * 50);

$myvarone=intval($myvar * 50 - 50);
$myvartwo=intval($myvar * 50);

$order=$_GET[order];
$sql="Select * from oxemdb where id > ${myvaro} and id <= ${myvart} order by id ${order}";

$sqltwo="Select * from oxemdb";
$querytwo=$pdo->prepare($sqltwo);
$querytwo->execute();
$i=0;
$j=1;

while($querytwo->fetch(PDO::FETCH_ASSOC)){
	$i++;
};
if($i % 50 === 0){

}
else{
	$i+=1;
};
$i/=50;

$query=$pdo->prepare($sql);
$query->execute();
echo "<table border=1>
<td>id</td>
<td>name</td>
<td>description</td>
<td>dateOfCreation</td>
<td>price</td>
<td>remainder</td>
<td>categories</td>
<td>externalID</td>";

			while($product=$query->fetch(PDO::FETCH_ASSOC)){
				echo "<tr>
				<td>$product[id]</td>
				<td>$product[name]</td>
				<td>$product[description]</td>
				<td>$product[dateOfCreation]</td>
				<td>$product[price]</td>
				<td>$product[remainder]</td>
				<td>$product[categories]</td>
				<td>$product[externalID]</td></tr>";

			};

			echo "</table>";

		while($j<$i+1){
			echo "<a href=index.php?page=$j>${j}</a>";
			$j++;
		};
?>
<script>
function write(arg1){
	console.log(JSON.stringify(arg1));
}
function createProduct(arg1,arg2,arg3,arg4,arg5,arg6){
			$.ajax({
			url:"./createProduct.php",
			type:"GET",
			cache:false,
			data:{
				'argumentName':arg1,
				'argumentDescription':arg2,
				'argumentPrice':arg3,
				'argumentRemainder':arg4,
				'argumentCategories':arg5,
				'argumentExternalId':arg6,
			},
			dataType:"html",
			success: function(data){
					write(data)
				}
		});
	
}
function getProductListByCategory(arg1){
			$.ajax({
			url:"./getProductListByCategory.php",
			type:"GET",
			cache:false,
			data:{
				"argumentId":arg1
			},
			dataType:"json",
			success: function(data){
					write(data)
				}
		});
	
}
function getProduct(arg1){
			$.ajax({
			url:"./getProduct.php",
			type:"GET",
			cache:false,
			data:{
				'argumentId':arg1
			},
			dataType:"json",
			success: function(data){
					write(data)
				}
		});
	
}
function getAllCategories(){
			$.ajax({
			url:"./getAllCategories.php",
			type:"GET",
			cache:false,
			data:{
				
			},
			dataType:"json",
			success: function(data){
					write(data)
				}
		});
	
}
function deleteProduct(arg1){
			$.ajax({
			url:"./deleteProduct.php",
			type:"GET",
			cache:false,
			data:{
				"argumentId":arg1
			},
			dataType:"json",
			success: function(data){
					write(data)	
				}
		});
	
}
function addCategory(arg1,arg2,arg3){
			$.ajax({
			url:"addCategory.php",
			type:"GET",
			cache:false,
			data:{
				"argumentName":arg1,
				"argumentParentId":arg2,
				"argumentExternalId":arg3
			},
			dataType:"html",
			success: function(data){
					write(data)
				}
		});
	
}
function editCategory(arg1,arg2){
			$.ajax({
			url:"./editCategory.php",
			type:"GET",
			cache:false,
			data:{
				"argumentColumn":arg1,
				"argumentValue":arg2
			},
			dataType:"html",
			success: function(data){
					write(data)
				}
		});
	
}
function deleteCategory(arg1){
			$.ajax({
			url:"./deleteCategory.php",
			type:"GET",
			cache:false,
			data:{
				"argumentId":arg1
			},
			dataType:"html",
			success: function(data){
					write(data)
				}
		});
	
}
</script>
</body>
</html>
