<?php
class base extends updateShows
{
	function __construct($db)
	{
		$this->db = $db;
	}
	function getActorInfo($aid)
	{
		$sql = "SELECT * FROM member WHERE id = :aid";
		$que = $this->db->prepare($sql);
		$que->bindParam(':aid', $aid);
		try { $que->execute();
			$array = [];	
			 while($row = $que->fetch(PDO::FETCH_ASSOC))
				{
					$array[] = $row;
				 
				}
			}catch(PDOException $e) { echo $e->getMessage();}
		print_r($array);
		return json_encode($array);
	}
	function getActorShows($aid)
	{
		$sql = "SELECT
					e.title as EID,
					t.name as title
					FROM
				episodes as e,
				title as t,
				titlemember as m
				WHERE
					t.id = e.titleId
					AND
					m.memberId = :aid;";
		$que = $this->db->prepare($sql);
		$que->bindParam(':aid', $aid);
		try { 
			$que->execute();
			$data = [];
			while($row = $que->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
				
			}
			print_r($data);
			return json_encode($data,JSON_PRETTY_PRINT);
		}catch(PDOException $e) { echo $e->getMessage();}
		#return false;
	}
	
}