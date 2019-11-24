<?php

class User
{
	protected $orders = null;

    /*
     * Method for validating  data from registration form and saving in db!
     */
    public function register($first_name, $last_name, $email, $password, $city, $zipcode, $address)
    {

        global $db_conn;
        /*
        * Escapes special characters in a string for security, before save in db
        */
		$first_name = mysqli_real_escape_string($db_conn, $first_name);
		$last_name = mysqli_real_escape_string($db_conn, $last_name);
		$email = mysqli_real_escape_string($db_conn, $email);
		$password = mysqli_real_escape_string($db_conn, $password);
		$city = mysqli_real_escape_string($db_conn, $city);
        $zipcode = mysqli_real_escape_string($db_conn, $zipcode);
        $address = mysqli_real_escape_string($db_conn, $address);

        $query =	<<<SQL
						INSERT INTO users (first_name, last_name, email, password, city, zipcode, address)
						VALUES ('$first_name', '$last_name', '$email','$password', '$city', '$zipcode', '$address')
SQL;

        $res = $db_conn->query($query);
        return $res;
    }

    public function login($email, $password)
    {

        /**
         *  first checking if email from data exists in db
         */
        global $db_conn;
        $query =	<<<SQL
						SELECT * FROM users WHERE email = '$email';
SQL;

        // if res = true fetch_user
        $res = $db_conn->query($query);
        if ($res->num_rows == 0) {
            return false;
        }

        $user = $res->fetch_assoc();

        // checking if password compair with hash, if compaire return user
        $isPasswordValid = password_verify($password, $user['password']);

        if ($isPasswordValid) {
            return $user;
        }

        return $isPasswordValid;

    }

    /*
     * Method for check if  that email is free to use. Check if in db dont have that one! AuthController  registration methoda
     */ 
    public function checkIfAvailable($email)
    {
    	global $db_conn;

    	$query =	<<<SQL
    					SELECT * FROM users WHERE email = '$email';
SQL;

		$res = $db_conn->query($query);
        return $res->num_rows == 0;

    }
    /*
     * Method for getting orders from database!
     */
    public function getOrders($id)
    {
        $users_orders = null;
        global $db_conn;
        $query = 'select * from orders where user_id = ' . $id . ';'; 
        $res = $db_conn->query($query);
       	if ($res->num_rows !== 0) {            
           	$users_orders = array();
           	while($order = $res->fetch_assoc()){
           		$users_orders['order'] = $order;
           	}
            $product_id = explode(',', $users_orders['order']['id_product']);
            foreach ($product_id as $id) {
               	$query_two = 'select product_name from products where id = ' . $id . ';';
               	$res_two = $db_conn->query($query_two);
               	$product =  $res_two->fetch_assoc();
               	$users_orders['order']['product'][] = $product['product_name'];
            }
        }
       	return $users_orders;
    }
    
    public function saveOrder($quantity, $total_cost, $id, $address, $city, $zipcode, $products, $date)
    {
        global $db_conn;
        $query = 'insert into orders (user_id, total_cost, delivery_address, delivery_city, delivery_zip, id_product, quantity, date) values ('.$id.', '.$total_cost.', "'.$address.'", "'.$city.'", '.$zipcode.', "'.$products.'",  "'.$quantity.'", "'.$date.'")';
        $res = $db_conn->query($query);
        if ($res) {
            return true;
        }
        return false;
    }
}