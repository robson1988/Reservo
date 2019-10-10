<?php

class Validate {
	
public function sanitize($input){ //funkcja czyszcząca inputa
	
	$input = trim($input);
	$input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
	$input = stripslashes($input);
	
	return($input);

}

public function exist($type = 'POST') {
	if(empty($_POST['login']) || empty($_POST['password'])){
		return false;
	} else {
	   return true;
		}		
	}

public function emailsCheck($email, $reemail) {
	if(empty($email) || empty($reemail)) {
		$error = "Proszę uzupełnić obydwa pola.";
		error($error);
		return false;
	}  else {
				if(($email) != ($reemail)) {
					$error = "E-maile muszą być identyczne.";
					error($error);
					return false;
				} else {
					return true;
				}
				
			}
		}
	}
	



