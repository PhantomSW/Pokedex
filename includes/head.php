<?php 
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
 } 
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= $title ?></title>
		<link rel="stylesheet" type="text/css" href="includes/style.css">
	</head>