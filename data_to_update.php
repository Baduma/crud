
<?php 
	require_once('database.php');
	if(!empty($_GET['id'])){
	$id = $_GET['id'];
	
	$pdo = Database::connect();
	$stmt= $pdo->prepare('select * from myguests where id = ?');
	$stmt->execute(array($id));
	$anz = $stmt->rowcount();
	$rows = $stmt->fetch();
	
	}
			
?>
<!DOCTYPE html>

<html>

<head> 
		<title>Update Data</title>
</head>
	
<body>
	<h2>Update Data</h2>
	<form action="update.php" method="get">
	<table width="100%">
			<tr>
				<td align="right"><label for="firstname">Firstname</label></td>
				<td><input type="text" id="firstname" name="firstname" size="30"  value="<?php echo $rows['firstname'];?> "/></td>
			</tr>
			<tr>
				<td align="right"><label for="lastname">Lastname</label></td>
				<td><input type="text" id="lastname" name="lastname" size="30"  value="<?php echo $rows['lastname'];?>"/></td>
			</tr>
			<tr>
				<td align="right"><label for="email" >E-mail</label></td>
				<td><input type="email" id="email" name="email" size="30" value="<?php echo $rows['email'];?>"/></td>
			</tr><tr></tr><tr></tr><tr>	</tr>
			<tr>
				<td><input type="hidden" name="id" value="<?php if(isset($id)){echo $id;}?>"></td>
			</tr>
			<tr>
			<td align="right"><h3><input type="submit" name="absenden" value="Update"> <a href="index.php">Back</a></h3></td>
			</tr>
			
		</table>
		</form>
</body>
</html>

<?php

if(!empty($_GET['firstname']) && !empty($_GET['lastname']) && !empty($_GET['email']) && !empty($_GET['id'])){
		echo $firstname = $_GET['firstname'];
		$lastname = $_GET['lastname'];
		$email = $_GET['email'];
		$id = $_GET['id'];
		$pdo = Database::connect();
		$stmt = $pdo->prepare('update myguests set firstname= ?, lastname=?, email=? where id=?');
		$stmt->execute(array($firstname,$lastname,$email,$id));
		var_dump($stmt);
		
}
?>