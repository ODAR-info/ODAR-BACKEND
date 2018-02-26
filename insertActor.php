<?php
include('bootstra.php');
$base = new base($db);
if(!isset($_POST['actor']))
{
?>
  <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">!-->
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
	<style type="text/css" href="assets/jquery-ui.min.css"></style>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
			$('#title').autocomplete({ source:'episodes.php?case=series'});
			$('#episode').autocomplete({source:'episodes.php?case=episodes'});
			$('#actor').autocomplete({source:'episodes.php?case=actors'});

        })
    </script>
<form action='insertActor.php' method='post'>
<table>
<tr>
	<th colspan='4'>Actor Episode</th>
</tr>
<tr>
	<td>Actor Name</td>
	<td>
		<input type='text' id='actor' name='actor' />
	</td>
	</tr>
	<tr>
		<td>Series Name</td><td><input type='text' name='title' id='title'/></td>
	</tr>
	<tr>
		<td>Episode Name</td><td><input type='text' name='episode' id='episode'></td>
	</tr>
	<tr>
		<td>Actor Role</td><td>
		<select multiple>
		<?php
			$sql = "SELECT type, id FROM roletype";
			$que = $db->prepare($sql);
			try { $que->execute(); 
				$html = '';
				 	while($row = $que->fetch(PDO::FETCH_ASSOC))
					{
						$html .= "<option value='{$row['id']}'>{$row['type']}</option>";
					}
				}catch(PDOException $e) { echo $e->getMessage();}
			echo $html;
		?>
		</select></td>
	</tr>
	<tr><th colspan=4><input type="submit" /></tr>
</table>
</form>
<?php }
else
{
	$base->insertEpisode($_POST);
}?>
