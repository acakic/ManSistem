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
	    $model = new User();
	    $_SESSION['orders']=$model->getOrders(25);

		$view = new View();
		$view->load('user', 'uprofile');
	}
	public  function userOrders()
    {

    }



}
