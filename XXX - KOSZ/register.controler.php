<?php

require_once "controler.php";

class Register extends Controler {
	
	public function index() {
		$view = $this->loadModel('register');
		
	}
}