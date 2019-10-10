 <?php
session_start();


spl_autoload_register('myAutoLoader'); // automatyczne załadowanie potrzebnej klasy

function myAutoLoader($className) {
	$path = "Model/";
	$extension = ".class.php";
	$fullPath = $path . $className . $extension;
	
	require_once $fullPath;
}


function error($error) {
	 $_SESSION['error'] = $error;
}

