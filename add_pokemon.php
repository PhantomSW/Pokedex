<?php
$title = 'Nouveau pokemon';
include('includes/head.php');
?>
	<body>
	
		<?php include('includes/header.php'); ?>

		<main>
		<div class="container">
		<div style="text-align: center;">
			<form method="POST" action="verif_pokemon.php" enctype="multipart/form-data">
				<?php include('includes/message.php'); ?>
				<h2>Ajouter un pokemon<h2>
				<input id="name" type="text" name="name" placeholder="Nom"><br>
				<input id="pv" type="text" name="pv" placeholder="PV"><br>
				<input id="attack" type="text" name="attack" placeholder="Attaque"><br>
				<input id="defense" type="text" name="defense" placeholder="Défense"><br>
				<input id="speed" type="text" name="speed" placeholder="Vitesse"><br>
				<div style="display:flex; margin-left: 50px; margin-top: 0px;">
					<p style="font-size: 16px; margin: 0px;">Image :
						<input type="file" name="image" accept="image/jpeg, image/png, image/jpg">
					</p>
				</div>
				<button type="submit">Ajouter</button>
			</form>
		</div>
		</div>
		</main>
		<?php include('includes/footer.php'); ?>

		
	</body>
</html>