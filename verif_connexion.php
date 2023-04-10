<?php 

// Champs vides ?
if( !isset($_POST['email']) 
	|| !isset($_POST['password'])
	|| empty($_POST['email'])
	|| empty($_POST['password'])
){
		$msg = 'Vous devez remplir les 2 champs.';
		header('location: connexion.php?message=' . $msg);
		exit();
}

// E-mail invalide ?
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	$msg = 'Email invalide.';
	header('location: connexion.php?message=' . $msg);
	exit();
}


include('includes/bd.php');

$q = 'SELECT id FROM users WHERE email = :email AND password = :password';
$req = $bdd->prepare($q);
$req->execute([
	'email' => $_POST['email'],
	'password' => hash('sha256', $_POST['password'])
]);

$results = $req->fetchAll(PDO::FETCH_ASSOC);

// Identifiants corrects ?
if(!$results) {
	$msg = 'Identifiants incorrects.';
	header('location: connexion.php?message=' . $msg);
	exit();
} else {
	session_start();
	$_SESSION['email'] = $_POST['email'];
	header('location: index.php');
	exit();
}
?>