<?php
class updateShows
{
	function insertEpisode($info)
	{
		print_r($info);
		$showID = $this->getShowId($info['title']);
		#$this->db->beingTransaction();
		/* Insert Series If Not Exist */
		if(!empty($showID))
		{
		$this->insertSeries($showID);
		}
		/* Insert Actors if they do not already exist */
		$actor = $this->getActorId($info['actor']);
		if(!empty($actor))
		{
			$this->insertActor($actor);
		}
		/* Insert Episode Name */
		if(!empty($episode))
		{
			$this->insertEpisode($episode);
		}
	}
	function insertSeries($id)
	{
		//* Check if a show already exists and insert it if it does not
		if(!is_numeric($id))
		{
			$sql = "INSERT IGNORE INTO title(name) VALUES (:id)";
			$que = $this->db->prepare($sql);
			$que->bindParam(':id', $id);
			try { $que->execute();}catch(PDOException $e){ echo $e->getMessage();}
		}
	}
	function insertActor($id)
	{
		//* Check if a show already exists and insert it if it does not
		if(!is_numeric($id))
		{
			$sql = "INSERT IGNORE INTO member(name) VALUES (:id)";
			$que = $this->db->prepare($sql);
			$que->bindParam(':id', $id);
			try { $que->execute();}catch(PDOException $e){ echo $e->getMessage();}
		}
	}
	function getShowId($title)
	{
		$sql = "SELECT id FROM title WHERE name = :title";
		$que = $this->db->prepare($sql);
		$que->bindParam(':title', $title);
		try { $que->execute();
				$row = $que->fetch(PDO::FETCH_ASSOC);
			 	$id = $row['id'];
			}catch(PDOException $e) { echo $e->getMessage();}
		if(!empty($id))
		{
			return $id;
		}
		else
		{
			return $title;
		}
		
	}
	function getActorId($name)
	{
		$sql = "SELECT id FROM member WHERE name = :name";
		$que = $this->db->prepare($sql);
		$que->bindParam(':name', $name);
		try { $que->execute();
				$row = $que->fetch(PDO::FETCH_ASSOC);
			 	$id = $row['id'];
			}catch(PDOException $e) { echo $e->getMessage();}
		if(!empty($id))
		{
			return $id;
		}
		else
		{
			return $name;
		}

	}
}