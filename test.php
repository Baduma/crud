

<?php
class Db{
	private $con;
	
	public function __construct($dbname){
		$this->con = new PDO("mysql:HOST=localhost;dbname=$dbname",'root',
	'',array(
			PDO::ATTR_PERSISTENT				=> true,
			PDO::ATTR_ERRMODE					=> PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE		=> PDO::FETCH_ASSOC,
			PDO::MYSQL_ATTR_USE_BUFFERED_QUERY 	=> true
		));
		$this->con->query('SET NAMES utf8');
		if($this->con){
			echo "Connection to Database created."."<br>";
		}
	}
	
	public function tbCreate($table){
		$query = "create table" ." ". $table."
		(id int(20) not null auto_increment primary key,
		 name varchar(50) not null
		)";
		$stmt =	$this->con->query($query);
		if($stmt){
			echo "Table successfully created";
		}
		
	}
	
	public function tbDelete($table){
		$query = "drop table" ." " .$table;
		$stmt = $this->con->query($query);
		if($stmt){
			echo "Table successfully deleted";
		}
		
	}
	
	public function insertData($table,$name){
		$stmt = $this->con->prepare("insert into" ." " .$table ." " ."(name) values (:name)");
		$stmt->bindparam(':name',$name);
		$stmt->execute();
		if($stmt){
			echo "Data successfully inserted";
		}
	}
	
	public function selectData($table){
		$db= $this->con;
		$stmt = $db->query("select * from" ." " .$table);
		
		$stmt->execute();
		$rows = $stmt->rowcount();
		$rows= $stmt->fetchAll();
		foreach($rows as $rowsvalue){
			echo $rowsvalue['id'] ." " .$rowsvalue['name'] ."<br>";
		}
		
	}
}

/*$obj1 = new Db();
$obj1->tbCreate('mytable7'); 
$obj2 = new Db();
$obj2->tbDelete('mytable3');
$obj2->tbDelete('mytable4');
$obj2->tbDelete('mytable5');
$obj2->tbDelete('mytable7');

$obj3 = new Db();
$obj3->connect();

$obj3->insertData('mytable','Happy Family');*/
$obj1 = new Db('webnutzer');
//$obj1->connect('webnutzer');
/*var_dump($obj1);
exit();*/
$obj1->selectData('mytable');

/*var_dump($obj1);
exit();*/









?>