<?php

class Token {
	
	//generuje zaszyfrowany token, przekazuje token do sesji
	public function generate() {
		$_SESSION['token'] = md5(mt_rand());
		return $_SESSION['token'];
	}
	//sprawdza czy wygenerowany token i token przesłany z formularzem są identyczne
	public function check() {
		if($_SESSION['token'] === $_POST['token']) {
			$_SESSION = array();
			return true;
			} else {
			return false;
		}

}
}


