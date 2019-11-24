			<div class="wrapper">
				<main class="registrateContainer">
					<h1>Napravi nalog na našem sajtu!</h1>
					
					 <!-- error message for registrate  -->
					 <?php if(isset($_GET['error'])) :?>
					 	<div class="error">
					 		<img src="<?php echo WEBROOT; ?>/assets/css/pictures/shield-err.png" alt="checked success">
					 		<p><?php //echo $_GET['last_name'];?></p>
					 	</div>
					 <?php endif; ?>
							
					<div class="registrateBox">
						<img class="avatarRegistrate" src="../assets/css/pictures/avatar.png">
						<h1>Registrate</h1>
						<form action="<?php echo WEBROOT; ?>/auth/register" method="post">

							<?php
	                        //if (isset($_GET['first_name'])) {
	                           //	echo '<div class="err">' .  $_GET['first_name']. '</div>';
	                        //}
	                        ?>
							<label for="first_name">First Name</label>
							<input type="text" name="first_name" placeholder="Enter First Name" value="">

							<?php
	                        //if (isset($_GET['last_name'])) {
	                           	//echo '<div class="err">' .  $_GET['last_name']. '</div>';
	                        //}
	                        ?>
							
							<label for="last_name">Last Name</label>
							<input type="text" name="last_name" placeholder="Enter Last Name" value="">

							<?php
	                        //if (isset($_GET['email'])) {
	                        //   	echo '<div class="err">' .  $_GET['email']. '</div>';
	                        //}
	                        ?>
							
							<label for="email">E-mail</label>
							<input type="email" name="email" placeholder="johndoe@xmpl.com" value="">

							<?php
	                        //if (isset($_GET['password'])) {
	                           	//echo '<div class="err">' .  $_GET['password']. '</div>';
	                       // }
	                        ?>
							
							<label for="password">Password</label>
							<input type="password" name="password" placeholder="Enter Password">

							<label for="re_password">Re-Type Password</label>
							<input type="password" name="re_password" placeholder="Enter Password">

	                       
							<label for="city">Grad</label>
							<input type="text" name="city" placeholder="Enter city name">

							<?php
	                        //if (isset($_GET['zipcode'])) {
	                          // 	echo '<div class="err">' .  $_GET['zipcode']. '</div>';
	                        //}
	                        ?>

							<label for="zipcode">Zip code</label>
							<input type="text" name="zipcode" placeholder="Enter zip code">

							<?php
	                        //if (isset($_GET['address'])) {
	                           	//echo '<div class="err">' .  $_GET['address']. '</div>';
	                        //}
	                        ?>

							<label for="address">Adresa</label>
							<input type="text" name="address" placeholder="Enter your address">

							<!-- <label for="terms">Accept the Terms & Conditions of this site</label>
							<input type="checkbox" name="terms[]" value="agreement" placeholder="">I agree with the Terms & Conditions. -->

							<input type="submit" name="registrate" value="Registrate">

							<a href="<?php echo WEBROOT; ?>/users/login">Already a user?</a>
						</form>
					</div>	<!-- registrateBox end -->
				</main>	<!-- registrateContainer -->
			</div>	<!-- container wrapper end -->
