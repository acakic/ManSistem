<?php

class UsersController
{


// instanciranje  authController zaduzen za validaciju.
  public function register()
	{
		$view = new View();
		$view->load('user', 'register');
	}

	public function login()
	{
		$view = new View();
		$view->load('user', 'login');
	}

	public function uprofile()
	{
		$view = new View();
		$view->load('user', 'uprofile');
	}



}
