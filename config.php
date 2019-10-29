<?php

// promeni ime baze pre nego sto otvoris
$db_conn = new mysqli('localhost', 'root', '', 'mansistem');
$db_conn->query("SET NAMES utf8");
$db_conn->query("SET CHARACTER SET utf8");
$db_conn->query("SET COLLATION_CONNECTION='utf8_general_ci'");

define("WEBROOT", "http://www.mansistem.com");

