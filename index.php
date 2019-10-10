<?php
	//sprawdza adres url i przekierowuje do odpowiedniego widoku
	require_once "controler/view.controler.php";
	require_once "init.php";
	
	
	
	
	if(empty($_GET['task']) || !empty($_GET['task'] == 'home')) {
		$obj = new viewControler();
		$obj->index('main'); //przekieruj na strone główną
}  else if($_GET['task'] == 'o-aplikacji') {
		$obj = new viewControler();
		$obj->index('o-aplikacji');  //przekieruj na strone o aplikacji
}  else if($_GET['task'] == 'oferta') {
		$obj = new viewControler();
		$obj->index('oferta');  //przekieruj na strone oferta
}  else if($_GET['task'] == 'login') {
		$obj = new Controler();
		$obj->loadModel('login');  //przekieruj na strone oferta
} else if($_GET['task'] == 'register') {
		$obj = new Controler();
		$obj->loadModel('register');
} else if($_GET['task'] == 'dashboard') {	//sprawdzenie czy użytkownik jest zalogowany
		$obj = new dashboardControler();
		$obj->index('dashboard');
}else if($_GET['task'] == 'logout') {	//wylogowanie użytkownika
		$obj = new Controler();
		$obj->loadModel('logout');
}else if($_GET['task'] == 'reset') {	//reset hasła do serwisu
		$obj = new Controler();
		$obj->loadModel('resetpass');
}

//do zrobienia ->jesli adres nie istnieje lub jest blędnie wpisany przekierowanie na strone główną