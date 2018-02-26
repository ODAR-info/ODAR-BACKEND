<?php
include('bootstra.php');
if(isset($_GET['term']))
{
	$query = '%'.$_GET['term'].'%';
	$sql = "SELECT name FROM title WHERE name LIKE :query";
	$que = $db->prepare($sql);
	$array = [];
	$que->bindParam(':query', $query);
	try { $que->execute();
			while($row = $que->fetch(PDO::FETCH_ASSOC))
			{
				$array['name'] = $row['name'];
				
			}
		}catch(PDOException $e) {}
	#print_r($array);
	echo json_encode($array);
	
}