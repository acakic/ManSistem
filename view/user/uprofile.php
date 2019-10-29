			<main class="uprofileContainer">
				<h1><?php echo strtoupper($loggedUser);?>  Profilna strana</h1> 
				<div class="columnsHolder">	
					<div class="parts1">
						<img src="<?php echo WEBROOT; ?>/assets/css/pictures/avatar.png">
						<h3>Detalji</h3>
						<p>First Name:  <b><?php 	echo ucfirst($_SESSION['loggedUser']['first_name']);?></b>  </p>
						<p>Last Name:  <b><?php 	echo ucfirst($_SESSION['loggedUser']['last_name']) ?></p></b>
						<p>Email:  <b><?php 		echo $_SESSION['loggedUser']['email']; ?></p></b>
						<p>City:  <b><?php 			echo ucfirst($_SESSION['loggedUser']['city']); ?></p></b>
						<p>Zip code:  <b><?php 		echo $_SESSION['loggedUser']['zipcode']; ?></p></b>
						<p>Address:  <b><?php 		echo ucfirst($_SESSION['loggedUser']['address']); ?></p></b>
					</div>

					<div class="parts1">
						<div class="history">
							<a href="#">Podesavanje profila
								<img src="<?php echo WEBROOT; ?>/assets/css/pictures/settings.png" ?>
							</a><br>
							<a href="#">Obrisi profil
								<img src="<?php echo WEBROOT; ?>/assets/css/pictures/delete.png">
							</a>
							<h3>Porudzbine</h3>
							<div class="orders">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
						</div>
					</div>
				</div> <!-- columnsHolder end  -->
			</main>

