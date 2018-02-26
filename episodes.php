<?php
include('bootstra.php');
switch($_GET['case'])
{
		
	case 'episodes':
	if(isset($_GET['term']))
	{
		$query = '%'.$_GET['term'].'%';
		$sql = "SELECT title FROM episodes WHERE title LIKE :query";
		$que = $db->prepare($sql);
		$array = [];
		$que->bindParam(':query', $query);
		try { $que->execute();
				while($row = $que->fetch(PDO::FETCH_ASSOC))
				{
					$array['name'] = $row['title'];

				}
			}catch(PDOException $e) {}
		#print_r($array);
		echo json_encode($array);

	}
	break;
	case 'actors':
	if(isset($_GET['term']))
	{
	$query = '%'.$_GET['term'].'%';
	$sql = "SELECT name FROM member WHERE name LIKE :query";
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
	break;
	case 'series':
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
	break;
}
?>