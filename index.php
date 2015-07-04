<! DOCTYPE html>
<html>
<head>
	<title>OOP-PHP-MYSQL</title>
</head>
<body bgcolor="#cc00cc">

	<table border="10" cellspacing="5" cellpadding="10" width="50%">
		<tr>
			<th bgcolor="white">ID</th>
			<th bgcolor="white">Firstname</th>
			<th bgcolor="white">Lastname</th>
			<th bgcolor="white">Email</th>
			<th bgcolor="white" colspan="4">Action</th>
		</tr>


<?php 

require_once('database.php');
$pdo = Database::connect();
/*$query = "create table myguests
	(id int(20) not null auto_increment primary key,
	firstname varchar(20) not null,
	lastname varchar(20) not null,
	email varchar(20) not null
	)";
$pdo->query($query);
*/


$query = "select id,firstname,lastname,email from myguests";
$rows = $pdo->query($query);

$stmt = $rows->fetchAll();
$anz = $rows->rowcount();
//var_dump($stmt);

?>

<?php
foreach($stmt as $stmtkey =>$stmtvalue)

{
?>
	<tr>
		<td bgcolor="white"><?php echo $stmtvalue['id'];?></td>
		<td bgcolor="white"><?php echo $stmtvalue['firstname'];?></td>
		<td bgcolor="white" ><?php echo $stmtvalue['lastname'];?></td>
		<td bgcolor="white"><?php echo $stmtvalue['email'];?></td>
		<td bgcolor="white"><a href="create.php">create</a></td>
		<td bgcolor="white"><a href="read.php?id=<?php echo $stmtvalue['id'];?>">read</a></td>
		<td bgcolor="white"><a href="data_to_update.php?id=<?php echo $stmtvalue['id'];?>">update</a></td>
		<td bgcolor="white"><a href="delete.php?id=<?php echo $stmtvalue['id'];?>">delete</a></td>
	</tr>
	
<?php
}
?>



	</table>
</body>
</html>
