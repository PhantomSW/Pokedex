<?php 

// Rempli ? name, pv, attack, defense, speed
if( !isset($_POST['name']) 
	|| !isset($_POST['pv'])
	|| !isset($_POST['attack'])
	|| !isset($_POST['defense'])
	|| !isset($_POST['speed'])
	|| empty($_POST['name'])
	|| empty($_POST['pv'])
	|| empty($_POST['attack'])
	|| empty($_POST['defense'])
	|| empty($_POST['speed'])
){
		$msg = 'Vous devez remplir tous les champs.';
		header('location: add_pokemon.php?message=' . $msg);
		exit();
}


var_dump($_FILES['image']);

if(!isset($_FILES['image']) && $_FILES['image']['error'] = 4){
		$msg = 'Vous devez ajouter une image.';
		header('location: add_pokemon.php?message=' . $msg);
		exit();
	}

if(isset($_FILES['image']) && $_FILES['image']['error'] != 4){
	$accept = ['image/jpg','image/jpeg','image/png'];
	if (!in_array($_FILES['image']['type'], $accept)){
		$msg = 'Le fichier doit être de type jpg, jpeg ou png !';
		header('location: add_pokemon.php?message=' . $msg);
		exit();
	}

	// Taille
	$maxSize = 5 * 1024 * 1024;
	if ($_FILES['image']['size'] > $maxSize){
		$msg = 'Le fichier doit faire moins de 5Mo';
		header('location: add_pokemon.php?message=' . $msg);
		exit();
	}

	// Dossier
	if(!file_exists('imgPokemons')){
		mkdir('imgPokemons');
	}

	$name = $_POST['name'];
	$array = explode('.', $_FILES['image']['name']);
	$extension = end($array);

	$filename = $name . '.' . $extension;


	// Enregistrer
	$destination = 'imgPokemons/'.$filename;
	if(!move_uploaded_file($_FILES['image']['tmp_name'], $destination)){
		$msg = 'Erreur lors de l\'enregistrement du fichier';
		header('location: add_pokemon.php?message=' . $msg);
		exit();
	}
}

include('includes/bd.php');
session_start();
// Récupérer l'utilisateur
$q = 'SELECT id FROM users WHERE email = :email';
$req = $bdd->prepare($q);
$req->execute([
				'email' => $_SESSION['email']
]);
$user = $req->fetch();

// Nom utilisé ?
$q = 'SELECT id FROM pokemons WHERE name = :name';
$req = $bdd->prepare($q);
$req->execute([
				'name' => $_POST['name']
]);
$reponse = $req->fetch();
if ($reponse != false){
	$msg = 'Le nom est déjà utilisé.';
	header('location: add_pokemon.php?message=' . $msg);
	exit();
}

// Insérer mysql
$q = 'INSERT INTO pokemons (name, pv, attack, defense, speed, image, id_user) VALUES (:name, :pv, :attack, :defense, :speed, :image, :id_user)';
$req = $bdd->prepare($q);
$reponse = $req->execute([ 
	'name' => $_POST['name'],
	'pv' => $_POST['pv'],
	'attack' => $_POST['attack'],
	'defense' => $_POST['defense'],
	'speed' => $_POST['speed'],
	'image' => isset($filename) ? $filename : '',
	'id_user' => $user['id']
]);

// Fonctionne? 
if($reponse == 0){
	$msg = 'Erreur lors de l\'inscription en base de données.';
	header('location: add_pokemon.php?message=' . $msg);
	exit();
} else {
$msg = 'Pokemon ajouté avec succès !';
header('location: profile.php?message=' . $msg);
exit();
}

?>




