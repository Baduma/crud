<! DOCTYPE html>
<html>
<head>
	<title>OOP-PHP-MYSQL</title>
<body>
</body>
</html>


<?php 

	class Database
	{
		/* Eigenschaften der Datenbankverbindung */
		private static $con;
		public function __construct()
		{
			die('Init function is not allowed');
		}
		public function connect()
		{
			//Datenbank Verbindung herstellen
		//if(self::$con == null)
		self::$con = new PDO("mysql:HOST=localhost;dbname=webnutzer",'root',
		'',array(
			PDO::ATTR_PERSISTENT				=> true,
			PDO::ATTR_ERRMODE					=> PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE		=> PDO::FETCH_ASSOC,
			PDO::MYSQL_ATTR_USE_BUFFERED_QUERY 	=> true
		));
		self::$con->query('SET NAMES utf8');
		return self::$con;
		}
		
		//Database disconnection
		public function disconnect()
		{
			self::$con = null;
		}
	}
	

?>	
	
	
	
	
	
