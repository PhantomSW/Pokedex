<?php session_start(); 
if(!isset($_SESSION['email'])){
    header('location: index.php');
    exit;
}
?>
<?php
$title = 'Profil';
include('includes/head.php');
?>
<style>
    main li {
        display: block;
    }
</style>

	<body>
		<?php include('includes/header.php'); ?>
        
		<main>
		<div class="container">
		<div style="text-align: center;">
			<h1>Mon compte</h1>
            <?php include('includes/message.php'); ?>
        </div>
            <?php
                include('includes/bd.php');
            
                $q= 'SELECT * FROM users WHERE email = :email';
                $req = $bdd->prepare($q);
                $req->execute([
                    'email' => $_SESSION['email']
                ]);
                $result = $req->fetch(PDO::FETCH_ASSOC);
                $none = 'none.png';
                if($result){
                    echo '<h2>Mes infos</h2>';
                    echo '<p style="display: inline;">Pseudo : </p><p style="display: inline; font-size: 14px;">'.$result['pseudo'].'</p>';
                    echo '<div><p style="display: inline;">E-mail : </p><p style="display: inline; font-size: 14px;">'.$result['email'].'</p></div>';
                    if(strlen($result['image'])<3){
                        echo '<p style="margin-bottom: 0px;"> Image de profil : </p><p style="display: inline; color: #FFF;"> Image de profil : </p><img id="imgProfil" style="display: inline;" src="images/'.$none.'" alt="image profil">';
                    } else {
                        //echo '<div><p style="display: inline;">Image de profil : </p><img id="imgProfil" src="uploads/'.$result['image'].'" alt="image profil"></div>';
                        echo '<p style="margin-bottom: 0px;"> Image de profil : </p><p style="display: inline; color: #FFF;"> Image de profil : </p><img id="imgProfil" style="max-width: 120px; max-height: 120px;" src="uploads/'.$result['image'].'" alt="image profil">';
                    }
                    echo '<p>─────────────────────────────────────────────────────────────────────────────────────────────────────────</p>';
                } else {
                    echo '<h2>Impossible d\'afficher les informations</h2>';
                }
            
            
                $a= 'SELECT * FROM pokemons WHERE id_user = :id';
                $requ = $bdd->prepare($a);
                $requ->execute([
                    'id' => $result['id']
                ]);
				
				$result2 = $requ->fetchAll(PDO::FETCH_ASSOC);
                echo '<h2>Mes pokemons</h2>';
                echo '<div style="display: flex; flex-wrap:wrap;">';
                foreach ($result2 as $pokemon)  {
                    echo '<div style="display: flex; padding: 16px;">
                        <ul style="padding-left: 0px; margin-right: 20px;">
                            <li><p style="display: inline;"><strong>'.$pokemon['name'].'</strong></p></li><br>
                            <li><p style="display: inline;">PV : </p><p style="display: inline;">'.$pokemon['pv'].'</p></li>
                            <li><p style="display: inline;">Attaque : </p><p style="display: inline;">'.$pokemon['attack'].'</p></li>
                            <li><p style="display: inline;">Défense : </p><p style="display: inline;">'.$pokemon['defense'].'</p></li>
                            <li><p style="display: inline;">Vitesse : </p><p style="display: inline;">'.$pokemon['speed'].'</p></li>
                        </ul>
                        <img class="img" style="margin-left: 20px; margin-right: 50px;" src=imgPokemons/'.$pokemon['image'].'></div>';
                }
                echo '</table></div>';

            ?>
		</div>
	</main>
    <?php include('includes/footer.php'); ?>

		
	</body>
</html>