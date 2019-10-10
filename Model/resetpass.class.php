<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(Validate::emailsCheck($_POST['email'], $_POST['re-email']) == true) { //sprawdzenie poprawności emaili
			Validate::sanitize($_POST['email']);	//sanityzacja inputa
			$table = 'users';
			$value = $_POST['email'];
			$data= array('userEmail', '=', $value);
		
			$select= new Database;
			$select->select($table, $data);
			if($select->count() == 1) {
					
				  $salt = rand(0,999);
				  $date = date_create();
				  $token = hash("sha256", date_timestamp_get($date).$salt);
				  $time = date_timestamp_get($date);
				  
				 $_SESSION['UserEmail'] = $select->results()[0]->UserEmail;
				 $_SESSION['UserName'] = $select->results()[0]->UserName;
				 $_SESSION['UserHash'] =$select->results()[0]->UserHash;
				 $_SESSION['UserToken'] =$token;
				 
				 Controler::redirect('model/mailer.class.php');
				
		}
		       else {
				$error = "Podany użytkownik nie istnieje.";
				error($error);
				Controler::redirect('index.php');
			}
			
	} else {
		Controler::redirect('index.php');
	}

} else {
	Controler::redirect('index.php');
}
