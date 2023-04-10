<?php 
	if (isset($_GET['message']) && !empty($_GET['message'])){
		echo '<p style="text-align: center; ">' . htmlspecialchars($_GET['message']) . '</p>';
	}
?>
