			<div class="wrapper">
				<main class="cartContainer">
					<?php $cntr = 0; ?>
					<?php if (!isset($_SESSION['cart']) || !isset($_SESSION['total_cost'])): ?>
					<h1>Vasa korpa je prazna!</h1>
					<?php else: ?>
					<br>
					<a class="backToProducts" href="<?php echo WEBROOT; ?>/products/all">Nazad u proizvode</a>
					<div class="cartTable">
						<h1>Vaša korpa <img class="cartIcon" src="<?php echo WEBROOT; ?>/assets/css/pictures/cart.png"></h1>
						<table cellspacing="0" cellpadding="10">
							<thead>
								<tr class="product">
									<th><?php echo '&nbsp'; ?></th>
									<th>Slika</th>
									<th>Ime</th>
									<th>Opis</th>
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
									<td><?php echo substr($value['description'], 0, 52); ?>...</td>
									<td><?php echo $value['price']; ?></td>
									<td><?php echo $value['quantity']; ?></td>
									<td><?php echo ($value['price'] * $value['quantity']); ?> rsd.</td>								
									<td><a href="#" class="removeFromCartAjax"  data-productId="<?php echo $value['id'];?>"><img src="<?php echo WEBROOT; ?>/assets/css/pictures/x-button.png" class="removeBtn"></a></td>
								</tr>
							<?php endforeach; ?>
							</tbody>
							<tfoot>
								<tr class="product">
									<td colspan='8'>TOTAL: <span class="total-cost"><?php echo isset($_SESSION['total_cost']) ? number_format($_SESSION['total_cost'], 2, ',', '.') : 0;?>rsd.</span></td>
								</tr>
							</tfoot>
						</table>					
						<a class="buyBtnn" href="<?php echo WEBROOT; ?>/products/order">Nastavi dalje!</a>
					</div><!-- cartTable end -->
					<?php endif; ?>
				</main>
			</div>	<!-- container wrapper end -->