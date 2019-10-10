<?php

require_once "controler.php";

class Login extends Controler {
	
	public function index() {
		$view = $this->loadModel('login');
		
	}
}