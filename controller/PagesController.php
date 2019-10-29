<?php

// require('./classes/View.php');
class PagesController
{
	public function about()
	{
		$view = new View();
		$view->load('pages', 'about');
	}
	public function contact()
	{
		$view = new View();
		$view->load('pages', 'contact');
	}
	public function howtobuy()
	{
		$view = new View();
		$view->load('pages', 'howtobuy');
	}
}
