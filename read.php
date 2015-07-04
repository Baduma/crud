
<?php 
	
	if(!empty($_GET['id'])){
	$id = $_GET['id'];
	require_once('database.php');
	$pdo = Database::connect();
	$stmt= $pdo->prepare('select * from myguests where id = ?');
	$stmt->execute(array($id));
	$anz = $stmt->rowcount();
	$rows = $stmt->fetch();
	
	}
			
?>

<!DOCTPYTE html>
<html>
<head>
	<title>Read</title>
</head>
<body>
	<h2>Read Data</h2>
	
	<label for="name">Firstname:</label>
	<label for=""><?php echo $rows['firstname'];?></label><br><br>
	
	<label for="name">Lastname:</label>
	<label for=""><?php echo $rows['lastname'];?></label><br><br>
	
	<label for="name">Email:</label>
	<label for=""><?php echo $rows['email'];?></label><br>
	
	<h3><a href="index.php">Back</a></h3>
</body>
</html>
	
	
		