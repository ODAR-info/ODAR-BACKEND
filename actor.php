<?php
include('bootstra.php');
$base = new base($db);
$aid = $_GET['aid'];
echo "<pre>";
#print_r($base->getActorInfo($aid));
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="application/javascript">
	$(document).ready()
	{
		console.log(<?php echo $base->getActorShows($aid); ?>);
	}
</script>
<?php echo $base->getActorShows($aid); ?>