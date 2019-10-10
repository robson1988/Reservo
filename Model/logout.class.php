<?php
require_once "controler/view.controler.php";

//zniszczenie sesji uzytkownika
if(isset($_SESSION['LogedIn'])) {
	session_start();
	$_SESSION = array();
	session_unset();
	
	Controler::redirect('index.php');
} else {
	Controler::redirect('index.php');
}

