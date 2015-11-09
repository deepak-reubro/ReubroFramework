<?php

class Controller{

	public static $vars;
	public static $model;
	public static $view;

	public static function loadController($handler, $vars=NULL){
		$path = 'controllers/';
		$file = $path.$handler.'.php';

		Controller::$vars = $vars;

		if(file_exists($file)){
			require_once $file;
		}else{
			echo "Controller ".$handler." not Found";
		}

	}

	public static function loadModel($model){
		$path = 'models/';
		$file = $path.$model.'.php';

		Controller::$model = $model;
		require_once $file;
	}

	public static function loadView($view){
		require_once 'core/view/Twig/Autoloader.php';
		Twig_Autoloader::register();

		$loader = new Twig_Loader_Filesystem('views');
		$twig = new Twig_Environment($loader);

		echo $twig->render($view.'.html', Model::$templateData);
	}

	public static function getVars(){
		return Controller::$vars;
	}


}