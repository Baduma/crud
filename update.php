<?php
require_once('database.php');

if(!empty($_GET['firstname']) && !empty($_GET['lastname']) && !empty($_GET['email']) && !empty($_GET['id'])){
		
		$firstname = $_GET['firstname'];
		$lastname = $_GET['lastname'];
		$email = $_GET['email'];
		$id = $_GET['id'];
		$pdo = Database::connect();
		$stmt = $pdo->prepare('update myguests set firstname= ?, lastname=?, email=? where id=?');
		$stmt->execute(array($firstname,$lastname,$email,$id));
		Database::disconnect();
		header("Location: index.php");
}
else{
	header("Location: index.php");
}

