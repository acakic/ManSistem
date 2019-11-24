			<div class="wrapper">
				<main class="loginContainer">
					<h1>Ulogujte se na našem sajtu!</h1>

					<?php if(isset($_GET['error'])) :?>
						<div class="error">
							<img src="<?php echo WEBROOT; ?>/assets/css/pictures/shield-err.png" alt="shield error">
							<p><?php echo $_GET['error'];?></p>
						</div>
					<?php endif; ?>
					<div class="loginbox">
						<img class="avatar" src="<?php echo WEBROOT; ?>/assets/css/pictures/avatar.png">
						<h1>Login</h1>
						
						<form action="<?php echo WEBROOT; ?>/auth/login" method="post">

							<label for="email">Email</label>
							<input type="email" name="email" placeholder="Enter Email">

							<label for="password">Password</label>
							<input type="password" name="password" placeholder="Enter Password">

							<input type="submit" name="login" value="Login">
							<input type="hidden" name="fn" value="login_form">

							<a href="#">Forget your password?</a>
							<a href="<?php echo WEBROOT; ?>/users/register">Don't have an account</a>
							
						</form>
					</div>
				</main>
			</div>	<!-- container wrapper end -->

