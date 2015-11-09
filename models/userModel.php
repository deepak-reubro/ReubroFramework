<?php

class UserModel extends Model{

	public static function index(){

		echo "inside index method of user model";
		print_r(Controller::getVars());

		$ar = array(
			'name' => 'deepak',
			'age' => '30'
			);
		
		// return data to template
		return  $ar;
	}

}