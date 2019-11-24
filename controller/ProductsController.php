<?php

class ProductsController
{

    /*
    *   Route for displaying about page.
    */
	public function about()
	{
		$view = new View();
		$view->load('products', 'about');
	}
    /*
    *   Route for displaying cart page.
    */
	public function bracket()
	{
		$view = new View();
		$view->load('products', 'bracket');
	}
    
	/*
	*	Route for displaying all products page and filtered products.
	*/
	public function all()
	{
		$product_model = new Product();
		$view = new View();

        if (isset($_GET['search'])) {
            $view->data['products'] = $product_model->searchForProduct($_GET['search']);
        }else if (isset($_GET['filter'])) {
            if (isset($_GET['productType'])) {
                $view->data['products'] = $product_model->filterProducts($_GET['productType']);
            }else{
                $view->data['products'] = $product_model->getAll();            
            }
        }else{
		  $view->data['products'] = $product_model->getAll();            
        }

		$view->load('products', 'all');

	}

	/*
	*	Route for displaying one product page.
	*/
	public function oneproduct()
	{
		$view = new View();
		$product_model = new Product();
		$view->data['products'] = $product_model->getOneProduct($_GET['id']);
		$view->load('products', 'oneproduct');
	}



	/*
	*	Route for displaying  product in cart.
	*/
    public function addToCartAjax()
    {
        $request_body = file_get_contents('php://input');
        $data = json_decode($request_body, true);

        $productId = (int)$data['productId'];
        $quantity = (int)$data['quantity'];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
            $_SESSION['quantity'] = 0;
        }

        if (!isset($_SESSION['total_cost'])) {
            $_SESSION['total_cost'] = 0;
        }

        $_SESSION['quantity'] += $quantity;
        $productModel = new Product();
        $product = $productModel->getOneProduct($productId);

        $_SESSION['total_cost'] += $quantity * $product['price'];

        if (!empty($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] = $_SESSION['cart'][$productId]['quantity'] + $quantity;
        } else {
            $_SESSION['cart'][$productId] = $product;
            $_SESSION['cart'][$productId]['quantity'] = $quantity;
        }

        echo json_encode(['msg' => 'Uspesno ste dodali proizvod u korpu', 'quantity' => $_SESSION['quantity']]);

    }

    /*
    *   Route for removing  products from cart.
    */
    public function removeFromCartAjax()
    {

        $request_body = file_get_contents('php://input');
        $data = json_decode($request_body, true);

        $productId = (int)$data['productId'];

        $product = $_SESSION['cart'][$productId];

        $_SESSION['quantity'] -= $product['quantity'];

        $_SESSION['total_cost'] -= $product['quantity'] * $product['price'];



        unset($_SESSION['cart'][$productId]);

        $totalCost = number_format($_SESSION['total_cost'], '2', ',', '.');

        if ($_SESSION['total_cost'] == 0) {
            unset($_SESSION['total_cost']);
        }

        echo json_encode(['totalCost' => $totalCost, 'quantity' => $_SESSION['quantity']]);



    }
    /*
    *   Route for displaying orders.
    */
    public function order()
    {
        $view = new View();
        $view->load('products', 'order');
    }

    public function checkbuy()
    {
        $view = new View();
        $view->load('products', 'checkbuy');
    }
}