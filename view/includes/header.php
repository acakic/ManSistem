<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<!-- <link rel="shortcut icon" type="image/x-icon" href="<?php //echo WEBROOT; ?>/assets/css/pictures/favicon.ico"> -->
		<link href="https://fonts.apis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT; ?>/assets/css/main.css">
		<!-- <link rel="shortcut icon" href="favicon.ico"> -->
	</head>
	<body>
		<!-- succes message for registrate and login  -->
		<?php if(isset($_GET['success'])) :?>
		<div class="success">
        	<img src="<?php echo WEBROOT; ?>/assets/css/pictures/checked.png" alt="checked success">
			<p><?php echo $_GET['success'];?></p>
		</div>
		<?php endif; ?>

		<header>
			<div class="logo-nav">
				<a href="products/about">
					<img src="<?php echo WEBROOT; ?>/assets/css/pictures/logo.png">
				</a>
			</div>	<!-- logo-nav end  -->
			<nav>	
				<ul>
					<li><a href="/pages">Pocetna</a></li>
					<li><a href="/products/all">Proizvodi</a></li>
					<li><a href="/pages/howtobuy">Kako kupiti?</a></li>
					<li><a href="/pages/contact">Kontakt</a></li>

					<li><a href="/products/bracket" class="cart-link">Korpa<img class="navCart" src="<?php echo WEBROOT; ?>/assets/css/pictures/cart.png"><span class="cart"><?php echo isset($_SESSION['quantity']) ? $_SESSION['quantity']: 0?></span></a></li>
					<!-- <li><a href="#">Pretraga</a> -->

                    <?php if (isset($_SESSION['loggedUser'])) : ?>
                    <?php $loggedUser = $_SESSION['loggedUser']['first_name'] . ' ' . $_SESSION['loggedUser']['last_name'] ?>
	                <li><a class="loged" href="/users/uprofile"><?php echo $loggedUser;?><img src="<?php echo WEBROOT; ?>/assets/css/pictures/accinfo.png"></a></li>
	                <li><a class="loged" href="/auth/logout">logout <img src="<?php echo WEBROOT; ?>/assets/css/pictures/logout.png"></a></li>
                    <?php else: ?>
	                <li><a href="/users/login">Login</a></li>
	                <li><a href="/users/register">Registrate</a></li>
					<?php endif;?>
					<!-- <div class="wrap">
   						<div class="search">
      						<input type="text" class="searchTerm" placeholder="Search...">
      						<button type="submit" class="searchButton">
        						<i class="fa fa-search"></i>
     						</button>
   						</div>
					</div> -->
				</ul>
			</nav>
		</header>

		
