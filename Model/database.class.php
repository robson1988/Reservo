<?php

class Database {
	
	protected $pdo;
	public $count = 0;
	public$result;
	public $msg;
	
	public function __construct() {
		
		try {
		require_once "Includes/connect.php";
	    $this->pdo = new PDO('mysql:host=' . $host . ';dbname='. $dbname .';charset=' . $charset, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $this->pdo;
		
       } catch (PDOException $e) {
         die("Błąd połączenia z bazą danych ".$e->getMessage());
      }
	}
	
	
	public function prepare($action, $table, $data = array()) {
		if(count($data) === 3) {
			$operators = array('=');
			
			$field = $data[0];
			$operator = $data[1];
			$value = $data[2];
			
			if(in_array($operator, $operators)) {
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ? ";
				
				$stmt = $this->pdo->prepare($sql);
				$stmt->bindValue(1, $value, PDO::PARAM_STR);
				$stmt->execute();
				$this->result=$stmt->fetchAll(PDO::FETCH_OBJ); //wyciągnięcie i wsadzenie danych do tablicy
				$this->count=$stmt->rowCount();	//przeliczenie ilości rekordów zgodnych z zapytaniem
				$stmt->closeCursor();	//wyczyszczenie zapytania
				return $this;
				 //echo $this->count;
				  //print_r(array_values($this->result));
		}
		return false;	
	}
	}
	//wyciągnięcie wszystkich elementów
	public function select($table, $data) {
		return $this->prepare('SELECT *', $table, $data);
	}
	//usunięcie elementu z bazy
	public function delete($table, $data) {
			return $this->prepare('DELETE', $table, $data);
	}
	//stworzenie nowego użytkownika w bazie
	public function insertUser($data = array()) {
		if(count($data)) {
			$keys = array_keys($data);
			$values = null;
			$x=1;
			
			foreach($data as $field) {
				$values .= "?";
				if($x < count($data)) {
					$values .= ', ';
				}
				$x++;
			}
			
			$sql = "INSERT INTO users (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
				
				$stmt = $this->pdo->prepare($sql);
				$x=1;
				
				if(count($data)) {
					foreach($data as $param) {
					$stmt->bindValue($x, $param);
					$x++;
				}	
			} 
			if($stmt->execute()) {
				//wyczyszczenie zapytania
				$stmt->closeCursor();  
				$this->msg = "Sukces!";
				return $this;
				
			} else {
				return false;
			}		
		}
	return false; 		
    }
	
	//aktualizacja rekordu w bazie
	public function update() {
		
	}
	//wyświetlenie wiadomości
	public function msg()	{
		echo $this->msg;
}

	public function count() {			//zwrócenie ilości znalezionych rekordów
		return $this->count;
	}
	public function results() {
		return $this->result;

	}
	
}

//KOD TESTUJACY

//$action = '*';
//$table ='users';
//$data = array('userName'=>'bobek', 'userSurname'=>'Nunuś','userEmail'=>'blabla@gmail.com');

//$x= new Dbase();
//$x->insertUser($data)->msg();


//"SELECT {$action}" FROM {$table} WHERE {$data};
//"SELECT      *    FROM users WHERE UserId ='1';"
//"SELECT UserEmail FROM users WHERE UserId ='1';"
