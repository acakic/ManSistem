			<main class="orderContainer">
				<h1>Narudzbenica</h1>
				<div class="orderBox">
					<img class="avatarRegistrate" src="../assets/css/pictures/wallet.png">
					<form action="<?php echo WEBROOT; ?>/products/checkbuy" method="post">

						<label for="first_name">Ime: </label>
						<input type="text" name="first_name" placeholder="Enter First Name" value="<?php 
						if (isset($_SESSION['loggedUser']['first_name'])) {
							echo ucfirst($_SESSION['loggedUser']['first_name']);    
						} else {  
							echo "";
						}
						?>">

						<label for="last_name">Prezime: </label>
						<input type="text" name="last_name" placeholder="Enter Last Name" value="<?php 	
							if (isset($_SESSION['loggedUser']['last_name'])) {
								echo ucfirst($_SESSION['loggedUser']['last_name']);    
							} else {  
								echo "";
							}
						?>">

						<label for="email">E-mail: </label>
						<input type="email" name="email" placeholder="johndoe@xmpl.com" value="<?php 	
							if (isset($_SESSION['loggedUser']['email'])) {
								echo ucfirst($_SESSION['loggedUser']['email']);    
							} else {  
								echo "";
							}
						?>">

						<label for="country">Država: </label>
						<input type="text" name="country" placeholder="johndoe@xmpl.com" value="Srbija">

						<label for="city">Grad: </label>
						<input type="text" name="city" placeholder="Leskovac" value="<?php 	
							if (isset($_SESSION['loggedUser']['city'])) {
								echo ucfirst($_SESSION['loggedUser']['city']);    
							} else {  
								echo "";
							}
						?>">

						<label for="zipcode">Zip code: </label>
						<input type="number" name="zipcode" placeholder="16000" value="<?php 	
							if (isset($_SESSION['loggedUser']['zipcode'])) {
								echo ucfirst($_SESSION['loggedUser']['zipcode']);    
							} else {  
								echo "";
							}
						?>">

						<label for="address">Adresa: </label>
						<input type="text" name="address" placeholder="Voje Mičića 13" value="<?php 	
							if (isset($_SESSION['loggedUser']['address'])) {
								echo ucfirst($_SESSION['loggedUser']['address']);    
							} else {  
								echo "";
							}
						?>">

						<label for="mobilephone">Mobilni: </label>
						<input type="number" name="mobilephone" placeholder="065*****67" value="">

						<input type="submit" name="order" value="Nastavi dalje">
					</form>
				</div>	<!-- orderBox -->
			</main>