<?php

class View
{
	//  data have  all products saved inside.
	public $data = array();

	public function load($entity_name, $partial_name)
	{
		$title = ucfirst($entity_name) ." | ". ucfirst($partial_name);

		require('./view/includes/header.php');

		require('./view/'.$entity_name.'/'.$partial_name.'.php');

		require('./view/includes/footer.php');

	}

}


