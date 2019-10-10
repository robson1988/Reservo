<?php

require_once "controler.php";

class viewControler extends Controler {
	
	public function index($name) {
		$view = $this->loadView($name);
	}
	
}

class dashboardControler extends Controler {		
	
	public function index($name) {
			 if(isset($_SESSION['LogedIn'])) {
				$view = $this->loadView($name);
			} else {
				$view = $this->loadView('main');
			}
}
}