<?php


class Router
{

	protected $controller = 'PagesController';
	protected $method = 'about';
	protected $params = [];


	public function __construct()
	{	
		$url = $this->parseUrl();
		$this->availableRoutes();
	}

	/*
	*	returning url, 	1. explode - Exploding by character,
	*					2. filter_var - Filters a variable with a specified filter.
	*					3. rtrim - This function returns a string with whitespace (or other characters) stripped from the end of str.
	*					4. FILTER_SANITIZE_URL - Remove all characters except letters, digits and $-_.+!*'(),{}|\\^~[]`<>#%";/?:@&=.
	*/
	public function parseUrl()
	{
		if (isset($_GET['url'])) {
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}

	/*
	*				 	1. controller_base - on 0 element is controller and 1 element is method. 
	*					2. $controller_name - taking controller_base and adding 'Controller'.
	*					3. file_exists - checking if that controller exists.
	*					4. require that controller.
	*					5. taking 1 element method.
	*					6. checking if method exists in that controller
	*					7. params = 0-controller name and 1-method.
	*					8. call_user_func_array - Calls the callback given by the first parameter with the parameters in param_arr. 
	*/

	public function availableRoutes()
	{	
		$controller_base = $this->parseUrl()[0];
		$controller_name = ucfirst($controller_base).'Controller';
		if (file_exists('./controller/' . $controller_name . '.php')) {
			$this->controller = $controller_name;
			unset($this->parseUrl()[0]);
		}
		require_once('./controller/' . $this->controller .'.php');
		$this->controller = new $this->controller;
		if (isset($this->parseUrl()[1])) {
			if (method_exists($this->controller, $this->parseUrl()[1])) {
				$this->method = $this->parseUrl()[1];
				unset($this->parseUrl()[1]);
			}
		}
		$this->params = $this->parseUrl() ? array_values($this->parseUrl()) : [];
		call_user_func_array([$this->controller, $this->method], $this->params);
	}
}
