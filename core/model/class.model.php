<?php

class Model extends Controller{

	public static $templateData;

	public static function call($method){
       Model::$templateData = call_user_func(array(Controller::$model, $method));
	}

}