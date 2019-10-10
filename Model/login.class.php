<?php

/*
uzytkownik klika zaloguj, wysyła get request->controler wyłapuje, laduje model-> authentication.class.php: połącznenie z bazą, ustawienie metod dostepowych get i set user, password, validacja pól, hash hasła, funkcja login pobiera z innego pliku, jeśli znaleziono użytkownika - ustawiamy sesje, zamykamy połaczenie z bazą. 
*/


if(Token::check() === true) {
	if(Validate::exist() === false) {
		$error = 'Fields can not be empty!';
		error($error);
		Controler::redirect('index.php');
		return false;	
	} else {
		Validate::sanitize($_POST['login']);	//sanityzacja inputa
		$table = 'users';
		$value = $_POST['login'];
		$data= array('userEmail', '=', $value);
		
		$select = new Database;				
		$select->select($table, $data);
		if($select->count() == 1) {			//sprawdzenie czy użytkownik istnieje w bazie
			
			Validate::sanitize($_POST['password']); //sanityzacja inputa
			$hashedPwdCheck = password_verify($_POST['password'], $select->results()[0]->UserPass);  //porównanie haseł wpisanych w inpucie i hasła z bazy danych
			if($hashedPwdCheck == false ) {
               $error = "Incorrect Username or Password.";
			   error($error);
			   $obj = new viewControler();
			   $obj->index('main');
		
			 } else if($hashedPwdCheck == true) {		//zalogowanie użytkownika i ustawienie sesji
				
				
				
				$_SESSION['LogedIn'] = true;
				$_SESSION['UserId'] = $select->results()[0]->UserId;
				$_SESSION['UserCompany'] = $select->results()[0]->UserCompany;
				$_SESSION['UserName'] = $select->results()[0]->UserName;
				$_SESSION['UserSurname'] = $select->results()[0]->UserSurname;
				$_SESSION['UserEmail'] = $select->results()[0]->UserEmail;
				$_SESSION['UserStatus'] = $select->results()[0]->UserStatus;
				$_SESSION['UserHash'] = $select->results()[0]->UserHash;
				
					$obj = new viewControler();
					$obj->index('dashboard');
				}
			
			
		} else {
			    $error = 'Incorrect Username or Password.';
				error($error);
				Controler::redirect('index.php');
		}	
	} 
} else {
	$error = "Validation failed";
	error($error);
	Controler::redirect('index.php');
	return false;
}