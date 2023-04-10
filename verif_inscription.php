<?php 

// Rempli ?
if( !isset($_POST['email']) 
	|| !isset($_POST['password'])
	|| !isset($_POST['pseudo'])
	|| empty($_POST['email'])
	|| empty($_POST['password'])
	|| empty($_POST['pseudo'])
){
		// redirection avec un message d'erreur
		$msg = 'Vous devez remplir les 3 champs.';
		header('location: connexion.php?message=' . $msg);
		exit();
}


// E-mail invalide? 
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	$msg = 'Email invalide.';
	header('location: connexion.php?message=' . $msg);
	exit();
}


// Mot de passe ?
if(strlen($_POST['password']) < 8){
	$msg = 'Le mot de passe doit contenir un minimum de 8 caractères.';
	header('location: connexion.php?message=' . $msg);
	exit();
 // Manque minimum une majuscule et un caractère spécial
}
if (!(preg_match('/[0-9]+/', $_POST['password']) && preg_match('/[A-Z]+/', $_POST['password']) && preg_match('/[a-z]+/', $_POST['password']))) {
	$msg = 'Le mot de passe doit contenir au minimum une majuscule, une minuscule et un chiffre.';
	header('location: connexion.php?message=' . $msg);
	exit();
}

var_dump($_FILES['image']);
// Type
if(!(isset($_FILES['image']) && $_FILES['image']['error'] != 4)){
	$msg = 'Vous devez ajouter une photo de profil.';
		header('location: connexion.php?message=' . $msg);
		exit();
	}

if(isset($_FILES['image']) && $_FILES['image']['error'] != 4){
	$accept = ['image/jpg','image/jpeg','image/png','image/gif'];
	if (!in_array($_FILES['image']['type'], $accept)){
		$msg = 'Le fichier doit être de type jpg, jpeg, png ou gif !';
		header('location: connexion.php?message=' . $msg);
		exit();
	}

	// Taille
	$maxSize = 1024 * 1024;
	if ($_FILES['image']['size'] > $maxSize){
		$msg = 'Le fichier doit faire moins de 1Mo';
		header('location: connexion.php?message=' . $msg);
		exit();
	}

	// Dossier
	if(!file_exists('uploads')){
		mkdir('uploads');
	}

	$pseudo = $_POST['pseudo'];
	$array = explode('.', $_FILES['image']['name']);
	$extension = end($array);

	$filename = $pseudo . '.' . $extension;


	// Enregistrer
	$destination = 'uploads/'.$filename;
	if(!move_uploaded_file($_FILES['image']['tmp_name'], $destination)){
		$msg = 'Erreur lors de l\'enregistrement du fichier';
		header('location: connexion.php?message=' . $msg);
		exit();
	}
}

include('includes/bd.php');

// E-mail utilisé ?
$q = 'SELECT id FROM users WHERE email = :email';
$req = $bdd->prepare($q);
$req->execute([
				'email' => $_POST['email']
]);
$reponse = $req->fetch();
if ($reponse != false){
	$msg = 'Le mail est déjà utilisé.';
	header('location: connexion.php?message=' . $msg);
	exit();
}


// Pseudo utilisé ?
$q = 'SELECT id FROM users WHERE pseudo = :pseudo';
$req = $bdd->prepare($q);
$req->execute([
				'pseudo' => $_POST['pseudo']
]);
$reponse = $req->fetch();
if ($reponse != false){
	$msg = 'Le pseudo est déjà utilisé.';
	header('location: connexion.php?message=' . $msg);
	exit();
}

// Insérer mysql
$q = 'INSERT INTO users (pseudo, email, password, image) VALUES (:pseudo, :email, :password, :image)';
$req = $bdd->prepare($q);
$reponse = $req->execute([ 
	'pseudo' => $_POST['pseudo'],
	'email' => $_POST['email'], 
	'password' => hash('sha256', $_POST['password']),
	'image' => isset($filename) ? $filename : ''
]);

// Fonctionne? 
if($reponse == 0){
	$msg = 'Erreur lors de l\'inscription en base de données.';
	header('location: connexion.php?message=' . $msg);
	exit();
} else {
$msg = 'Compte créé avec succès !';
header('location: index.php?message=' . $msg);
exit();
}

?>




