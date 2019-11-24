			<div class="wrapper">
				<main class="checkbuyContainer">
					<h1>Poslednja provera</h1>
					<div class="checkbuyBox">
						<div class="dataInformation">
							<h2>Vaši podaci</h2>
							<p>Ime:<b><?php
							if (isset($_SESSION['loggedUser']['first_name'])) {
								echo ucfirst($_SESSION['loggedUser']['first_name']);    
							} else {  
								echo $_POST['first_name'];
							}
							?></b></p>
							<p>Prezime:<b><?php
								if (isset($_SESSION['loggedUser']['last_name'])) {
									echo ucfirst($_SESSION['loggedUser']['last_name']);    
								} else {  
									echo $_POST['last_name'];
								}
							?></b></p>
							<p>Email:<b><?php
								if (isset($_SESSION['loggedUser']['email'])) {
								echo $_SESSION['loggedUser']['email'];    
							} else {  
								echo $_POST['email'];
							}	
							?></b></p>
							<p>Država:  <b>Srbija</b></p>
							<p>Grad:  <b><?php
								if (isset($_SESSION['loggedUser']['city'])) {
								echo ucfirst($_SESSION['loggedUser']['city']);    
							} else {  
								echo ucfirst($_POST['city']);
							}
							?></b></p>
							<p>Zip code:<b><?php
							if (isset($_SESSION['loggedUser']['zipcode'])) {
								echo ($_SESSION['loggedUser']['zipcode']);    
							} else {  
								echo $_POST['zipcode'];
							}
							?></b></p>
							<p>Adresa:<b><?php
							if (isset($_SESSION['loggedUser']['address'])) {
								echo ucfirst($_SESSION['loggedUser']['address']);    
							} else {  
								echo $_POST['address'];
							}
							?></b></p>
							<p>Mobilni:<b><?php  echo $_POST['mobilephone']; ?></b></p>
						</div>	<!--dataInformation -->					
						<div class="dataInformation">
							<h2>Proizvodi</h2>
							<?php $cntr = 0; ?>
							 <?php if (!isset($_SESSION['cart']) || !isset($_SESSION['total_cost'])): ?>
							<h1>Vasa korpa je prazna!</h1>
							<?php else: ?>
							<div class="cartTable">
								<h1>Vaša korpa <img class="cartIcon" src="<?php echo WEBROOT; ?>/assets/css/pictures/cart.png"></h1>
								<table cellspacing="0" cellpadding="10">
									<thead>
										<tr class="product">
											<th><?php echo '&nbsp'; ?></th>
											<th>Slika</th>
											<th>Proizvod</th>
											<th>Cena</th>
											<th>kol.</th>
											<th>Ukupno</th>
											<th>Ukloni</th>
										</tr>
									</thead>
									<tbody>
									 	<?php foreach ($_SESSION['cart'] as $value): ?> 
										<tr class="product">
											<td><?php echo ++$cntr; ?>.</td>
											<td><img src="<?php echo $value['img_url']; ?>"></td>
											<td><?php echo $value['product_name']; ?></td>
											
											<td><?php echo $value['price']; ?></td>
											<td><?php echo $value['quantity']; ?></td>
											<td><?php echo ($value['price'] * $value['quantity']); ?> rsd.</td>								
											<td><a href="#" class="removeFromCartAjax"  data-productId="<?php echo $value['id'];?>"><img src="<?php echo WEBROOT; ?>/assets/css/pictures/x-button.png" class="removeBtn"></a></td>
										</tr>
									 	<?php endforeach; ?> 
									</tbody>
									<tfoot>
										<tr class="product">
											<td colspan='7'>TOTAL: <span class="total-cost"><?php
											 echo isset($_SESSION['total_cost']) ? number_format($_SESSION['total_cost'], 2, ',', '.') : 0;?>rsd.</span></td>
										</tr>
									</tfoot>
								</table>
							</div>	<!--cartTable -->					
							<a class="buyBtn" href="<?php echo WEBROOT; ?>/users/order">Kupi!</a>
						 	<?php endif; ?>	 
						</div>	<!--dataInformation -->
					 </div> <!-- end checkbuyBox -->
				</main>
			</div>	<!-- wrapper container end -->