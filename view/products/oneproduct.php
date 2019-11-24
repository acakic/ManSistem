			<div class="wrapper">
				<main class="productContainer">
					<div id="popUpMessage">
						<img src="<?php echo WEBROOT; ?>/assets/css/pictures/checked.png">
						<p>Uspesno ste dodali proizvod u korpu!</p>
					</div>	<!-- popUpMessage end -->
					<div class="productdesc">

						<?php $product = $this->data['products']; ?>

						<div class="productInfoContainer">
							<h1><?php echo $product['product_name']; ?></h1>
							<div class="productImgContainer">
								<img src="<?php echo $product['img_url']; ?>">
							</div>
							<p><?php echo $product['description']; ?></p>
							<h3>Cena: <span> <?php echo $product['price']; ?></span> rsd.</h3><br>
							<form action="<?php echo WEBROOT; ?>/products/add_to_cart?id=<?php echo $product['id']; ?>" method="post">
								Unesi količinu:<input type="number" name="quantity_cart" class="quantity" min="1" max="1000" value="1">

								<input type="hidden" class="product-id" value="<?php echo $product['id'];?>">
								<input id="pop" class="add-to-cart" type="submit" value="Dodaj u korpu!">
							</form><br>
							<a href="<?php echo WEBROOT; ?>/products/all">Nazad</a>
						</div> <!-- productInfoContainer end -->
					</div>
				</main>
			</div>	<!-- container wrapper end -->