<?php

class Product
{

	// creating one empty array, how letter can add in same.
	public $data = array();
	

	/*
	 * Method for fetching all products from the database (All products page).
	 */
	public function getAll()
	{
		global $db_conn;

		// Heredoc syntax is a way to write large bloc of text inside php.
		$query =	<<<SQL
						SELECT * FROM products;
SQL;
		// $query = 'select * from products';

		$res = $db_conn->query($query);
		while ($product = $res->fetch_assoc()) {
			$this->data[] = $product;
		}
		//  when while finish i returning whole array data with all products.
		return $this->data;
	}

	/*
	 * Method for fetching one products from the database (Single product page).
	 * used with ProductController method oneproduct
	 */
	public function getOneProduct($id)
	{
		global $db_conn;

		$query =	<<<SQL
						SELECT * FROM products WHERE id = '$id';
SQL;
		// if id founded in db that id gonna return back
		$res = $db_conn->query($query);
		$res = $res->fetch_assoc();
		return $res;
	}
	/*
	 * Method for fetching  products in cart from the database
	 */
	public function cart($id)
	{
		
		// get database connection
		$database = new Database();
		$db = $database->getConnection();

// initialize objects
		$product = new Product($db);
		$product_image = new ProductImage($db);

		// set page title
		$page_title = "Cart";
	}


	/*
	 * Read all product based on product ids included in the $ids variable
	 */
	public function readByIds($ids)
	{
 		// str_repeat repeating ? how much gets id and then subtraction -1.
	    $ids_arr = str_repeat('?,', count($ids) - 1) . '?';
	 
	    // query to select products
	    $query =	<<<SQL
						SELECT id, name, price, img_url FROM . $this->table_name . WHERE id IN ({$ids_arr}) ORDER BY name;
SQL;
	    // $query = "SELECT id, name, price, img_url FROM " . $this->table_name . " WHERE id IN ({$ids_arr}) ORDER BY name";
	    $stmt = $this->conn->prepare($query);
	    
    // execute query
	    $stmt->execute($ids);
	    
    // return values from database
	    return $stmt;
	}


	public function shoping($id)
	{
	   global $db_conn;

	   <<<SQL
						SELECT * FROM products WHERE id = '$id';
SQL;
	   // $query = 'select * from products where id = '. $id;
	   $res = $db_conn->query($query);
	   $product = $res->fetch_assoc();
	   return $product;
	} 

}

