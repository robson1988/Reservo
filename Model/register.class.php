<?php

if(Token::check() === true) {
	if($_GET['task'] == 'login') {
		echo $_POST['login'];
		//Controler::redirect('Model/login.class.php');
	} else if($_GET['task'] == 'register') {
		Controler::redirect('Model/register.class.php');
	} else {
		return false;
		Controler::redirect('index.php');
	}
} else {
	//echo $_SESSION['token']."<br>";
	//echo $_POST['token'];
	$error = 'Validation Failed';
	echo $_SESSION['error'] = $error;
}