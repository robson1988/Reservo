<?php

 class Controler {
	//przekierowanie do odpowiedniego url
	public function redirect($url) {
		header("Location: ". $url);
		
	}
	//załadowanie obiektu z widokiem
	public function loadView($name, $path='View/') {
        $path=$path.$name.'.view.php';
        //$name=$name .'view';
		
        try {
            if(is_file($path)) {
                require $path;
                //$ob=new $name();
				
            } else {
                throw new Exception('Can not open view '.$name.' in: '.$path);
            }
        }
        catch(Exception $e) {
            echo $e->getMessage().'<br />
                File: '.$e->getFile().'<br />
                Code line: '.$e->getLine().'<br />
                Trace: '.$e->getTraceAsString();
            exit;
        }
       //return $ob;
		
	}
	//załadowanie obiektu z modelem
	public function loadModel($name, $path='Model/') {
        $path=$path.$name.'.class.php';
        //$name=$name.'Model';
        try {
            if(is_file($path)) {
                require $path;
                //$ob=new $name();
            } else {
                throw new Exception('Can not open model '.$name.' in: '.$path);
            }
        }
        catch(Exception $e) {
            echo $e->getMessage().'<br />
                File: '.$e->getFile().'<br />
                Code line: '.$e->getLine().'<br />
                Trace: '.$e->getTraceAsString();
            exit;
        }
       // return $ob;
		
	}
}