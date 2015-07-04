<! DOCTYPE html>
<html>
<head>
	<title>OOP-PHP-MYSQL</title>
<body>

	<div class="container">
     
                <div >
                    <div class="row">
                        <h3>Learning without playing makes Jack become a doll boy!</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                     
                        <label class="control-label">Lastname</label>
                        <div class="controls">
                            <input name="lastname" type="text"  placeholder="Lastname" required>
                            
                         </div>
                        </div><br>
                      <div class="control-group" >
					  
                        <label class="control-label">Firstname</label>
                        <div class="controls">
                            <input name="firstname" type="text"  placeholder="Firstname" required >
                           
                        </div>
                      </div><br>
                      <div class="control-group >
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="email" type="email" placeholder="Email Address" required >
                            
                        </div>
						</div><br>
                      <div class="form-actions">
                          <h2><input type="submit" name="absenden" value="Anzeigen">
                          <a class="btn" href="index.php">Back</a><h3>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
</body>
</html>


<?php
     
    require_once('database.php');
 
    if ( !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email'])) {
                 
        // keep track post values
        $lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
        $email = $_POST['email'];
         
		require_once('database.php');
		$pdo = Database::connect();
		$stmt = $pdo->prepare('insert into myguests (firstname,lastname,email) values(?,?,?)');
		$stmt->execute(array($firstname,$lastname,$email));
		Database::disconnect();
		header("Location: index.php");
	}       
       
?>