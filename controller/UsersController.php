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

        $_SESSION['orders'] = $model->getOrders($_SESSION['loggedUser']['user_id']);


		$view = new View();
		$view->load('user', 'uprofile');
	}
	
	public function order()
    {
        if (!isset($_SESSION['cart'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        $total_cost = $_SESSION['total_cost'];
        if (isset($_SESSION['loggedUser'])) {
           $id = $_SESSION['loggedUser']['user_id'];
           $address = $_SESSION['loggedUser']['address'];
           $city = $_SESSION['loggedUser']['city'];
           $zipcode = $_SESSION['loggedUser']['zipcode'];
        }
        
        $products = null;
        foreach ($_SESSION['cart'] as $product) {
            $products .= $product['id']. ',';
        }

        $quantity = null;
        foreach ($_SESSION['cart'] as $product) {
            $quantity .= $product['quantity']. ',';
        }
        
        $quantity = substr($quantity, 0, -1);
        $products = substr($products, 0, -1);
        $date = date("Y-m-d ");
        $model = new User();
        $res = $model->saveOrder($quantity,$total_cost,$id,$address,$city,$zipcode,$products, $date);
        if ($res) {
        	header('Location: http://www.mansistem.com/users/uprofile?succ');
        }else{
        	header('Location: http://www.mansistem.com/users/uprofile?err');        	
        }
    }



}
