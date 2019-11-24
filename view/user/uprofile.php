<?php
	$product = null;
	if (isset($_SESSION['orders'])) {
	$orders = $_SESSION['orders'];
	foreach ($orders['order']['product'] as $product_name) {
		$product .= $product_name .', ';
	}
	$product = substr($product, 0, -2);
	}
?>
			<div class="wrapper">	
				<main class="uprofileContainer">
					<h1><?php echo strtoupper($loggedUser);?>  Profilna strana</h1> 
					<div class="columnsHolder">	
						<div class="parts1">
							<img src="<?php echo WEBROOT; ?>/assets/css/pictures/avatar.png">
							<div class="history">
								<a href="#">Podesavanje profila
									<img src="<?php echo WEBROOT; ?>/assets/css/pictures/settings.png" ?>
								</a><br>
								<a href="#">Obrisi profil
									<img src="<?php echo WEBROOT; ?>/assets/css/pictures/delete.png">
								</a>
								
							</div>
							<h3>DETALJI</h3>
							<p>First Name:  <b><?php 	echo ucfirst($_SESSION['loggedUser']['first_name']);?></b>  </p>
							<p>Last Name:  <b><?php 	echo ucfirst($_SESSION['loggedUser']['last_name']) ?></p></b>
							<p>Email:  <b><?php 		echo $_SESSION['loggedUser']['email']; ?></p></b>
							<p>City:  <b><?php 			echo ucfirst($_SESSION['loggedUser']['city']); ?></p></b>
							<p>Zip code:  <b><?php 		echo $_SESSION['loggedUser']['zipcode']; ?></p></b>
							<p>Address:  <b><?php 		echo ucfirst($_SESSION['loggedUser']['address']); ?></p></b>
						</div>

					</div> <!-- columnsHolder end  -->
					<div class="ordersHistory">
								<h3>VAŠE PORUDŽBINE</h3>
								<div class="orders">
									<?php if (isset($_SESSION['orders'])): ?>
										
									<table cellpadding="15" cellspacing="0" border="1">
										<thead>
											<tr>
												<th>Proizvod</th>
												<th>Ukupna cena</th>
												<th>Kolicina</th>
												<th>Adresa</th>
												<th>Grad</th>
												<th>Datum</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($orders as $order): ?>
												<tr>
													<td><?php echo $product; ?></td>	
													<td><?php echo $order['total_cost']; ?></td>	
													<td><?php echo $order['quantity']; ?></td>	
													<td><?php echo $order['delivery_address']; ?></td>	
													<td><?php echo $order['delivery_city']; ?></td>	
													<td><?php echo $order['date']; ?></td>	
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								<?php else: ?>
									<p>Nemate nijednu porudzbinu!</p>
								<?php endif ?>
								</div>
							</div>
				</main>
			</div>	<!-- container wrapper end -->

