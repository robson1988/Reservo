<?php

class Input {
	public static function exist($type = 'POST') {
				if(empty($_POST['login']) || empty($_POST['password'])){
					return false;
				} else {
					return true;
				}		
		}

	public static function get($item){
			if(isset($_POST[$item])) {
				return $_POST[$item];
			} else if(isset($_GET[$item])) {
				return $_GET[$item];
			}
			return '';
		}	
}		
		
