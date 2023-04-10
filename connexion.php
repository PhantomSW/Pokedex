<?php
$title = 'Connexion';
include('includes/head.php');
?>
<style>	
	form {
    width: 49%;
	margin: 0 1%;
	border: 1px solid;
	padding: 20px;
  }
  main {
	margin-left: 250px;
    margin-right: 250px;
  }
</style>

	<body>
		<?php include('includes/header.php'); ?>
		<main>
		<div style="text-align: center;">
			<h1>Connexion</h1>
        </div>
		
			<?php include('includes/message.php'); ?>

		<div class="contain-form">

			<form class="inside" method="POST" action="verif_connexion.php">
				<h2>Je possède un compte</h2>
				<input id="con-email" type="email" name="email" placeholder="E-mail"><br>
				<input id="con-password" type="password" name="password" placeholder="Mot de passe"><br>
				<button type="submit">Connexion</button>
			</form>

			<form method="POST" action="verif_inscription.php" enctype="multipart/form-data">
				<h2>Je crée un compte</h2>
				<input id="pseudo" type="text" name="pseudo" placeholder="Pseudo"><br>
				<input id="email" type="email" name="email" placeholder="E-mail"><br>
				<input id="password" type="password" name="password" placeholder="Mot de passe">
				<div style="display:flex; margin-left: 10px; margin-top: 0px;">
					<p style="font-size: 16px; margin: 0px;">Image de profil:
						<input type="file" name="image" accept="image/jpeg, image/png, image/jpg, image/gif">
					</p>
				</div>
				<button type="submit">Inscription</button>
			</form>

		</div>

		</main>

		<?php include('includes/footer.php'); ?>
	</body>
</html>