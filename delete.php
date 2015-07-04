<?php
 require_once('database.php');
 
 if(!empty($_GET['id'])){
	 $id = $_GET['id'];
	 echo "Do you really want to delete Data Nr:" ." " .$id ."?";
 } 
?>
	<html>
	<form action="delete.php" method="get">
	<input type="hidden" name="id" value="<?php if(isset($id)){echo $id;}?>">
	<h2><input type="submit" name="absenden" value="Yes"> <a href="index.php">No</a></h2>
	</form>	
	</html>
<?php	
	
	if(!empty($_GET['absenden']) && !empty($_GET['id'])){
	 $id = $_GET['id'];
	 $pdo = Database::connect();
	 $stmt = $pdo->prepare('delete from myguests where id = ?');
	 $stmt->execute(array($id));
	 header("Location: index.php");
	 }

?>

	