<?php

class UserController extends Controller{

	function __construct(){
		
		// load model
		Controller::loadModel('userModel');

		// call a method in the model
		Model::call('index');

		// load view
		Controller::loadView('userView');

	}

}


// Initialize class
new UserController();
