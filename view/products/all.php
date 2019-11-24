			<?php $checked = isset($_GET['productType']) ? $_GET['productType'] : array(); ?>
			<?php
				$first = 1;
				$page = isset($_GET['page']) ? $_GET['page'] : $first;
				$nmbr_of_products = 12;
				$products_per_page = $page * $nmbr_of_products;
				$offset = $products_per_page - $nmbr_of_products;
			?>
			<div class="wrapper">
				<div class="containerMiddle">
					<aside class="asideContainer">
						<h1>Filter</h1>
						<div class="search">
							<form>
								<!-- <label>Pretrazi</label> -->
								<input type="text" name="search" placeholder="Pretrazi">
								<img class="fa fa-search" src="<?php echo WEBROOT; ?>/assets/css/pictures/search.png">
							</form>
						</div>
						<!-- filter -->
						<form class="listForm" name="sortProducts">
							<input type="checkbox" name="productType[]" value="1" <?php echo in_array(1, $checked) ? 'checked' : ''; ?>>Hidračna Creva <br>
							<input type="checkbox" name="productType[]" value="2" <?php echo in_array(2, $checked) ? 'checked' : ''; ?>>Vazdušna Creva <br>
							<input type="checkbox" name="productType[]" value="3" <?php echo in_array(3, $checked) ? 'checked' : ''; ?>>Čaure <br>
							<input type="checkbox" name="productType[]" value="4" <?php echo in_array(4, $checked) ? 'checked' : ''; ?>>Spojnice <br>
							<input type="checkbox" name="productType[]" value="5" <?php echo in_array(5, $checked) ? 'checked' : ''; ?>>Podloške <br>
							<input type="checkbox" name="productType[]" value="6" <?php echo in_array(6, $checked) ? 'checked' : ''; ?>>Šuplji vijci <br>
							<input type="checkbox" name="productType[]" value="7" <?php echo in_array(7, $checked) ? 'checked' : ''; ?>>Reduciri <br>
							<input class="listFormtBtn" type="submit" name="filter">
						</form>
					</aside>	<!-- asideContainer end -->
					<main class="mainContainer">
						<h1 class="clearfix">Proizvodi</h1>
						<?php if ($this->data['products']): ?>
						<?php foreach (array_slice($this->data['products'], $offset, $nmbr_of_products) as $product) : ?>
						<div class="cardContainer">
							<div class="cardImg">
								<!-- create image in link -->
								<a href="<?php echo WEBROOT; ?>/products/oneproduct?id=<?php echo $product['id']; ?>">
									<img src="<?php echo $product['img_url']; ?>" alt="product-image">
								</a>
							</div>	<!-- cardImg end -->
							<h4><?php echo $product['product_name']; ?></h4>
							<p><?php echo substr($product['description'], 0, 42); ?> ...</p>
							<span class="holder">Cena: <?php echo $product['price']; ?> rsd.</span>
							<a href="<?php echo WEBROOT; ?>/products/oneproduct?id=<?php echo $product['id']; ?>" class="productBtn">Detaljnije</a>
						</div> <!-- cardContainer end -->
					 	<?php endforeach; ?>
				  		<div class="pagination">
								<!-- previous -->
								<div class="prethodna">
									<p><<a href="#">Prethodna</a></p>
								</div>
								<?php
									$numbers = array();
									$pages = null;
									$btn_nmbr = ceil(count($this->data['products']) / 12);
									for ($i=1; $i <= $btn_nmbr ; $i++) {
										$numbers[] = $i;
									}
								 ?>
								<?php $last = array_pop($numbers); ?>
								<?php if (intval($_GET['page']) < 3): ?>
									<?php foreach ($numbers as $value): ?>
										<?php if ($value <= 3): ?>
											<a href="/products/all?page=<?php echo $value; ?>" class="page_number"><?php echo $value; ?></a>
										<?php endif; ?>
									<?php endforeach; ?>
								<?php endif; ?>
							<?php if(intval($_GET['page']) >= 3 &&  intval($_GET['page']) <= 19 ): ?>
								<?php
								$page = intval($_GET['page']);
								$pages = array_slice($numbers, $page - 1, 3);
								?>
									<a href="/products/all?page=<?php echo $first; ?>" class="page_number"><?php echo $first; ?></a>
									<!-- <span>.</span>
									<span>.</span>
									<span>.</span> -->
								<?php
								foreach ($pages as $page) {
									?>
										<a href="/products/all?page=<?php echo $page; ?>" class="page_number"><?php echo $page; ?></a>
									<?php
								}
							?>
						<?php elseif(intval($_GET['page']) > 19): ?>
								<a href="/products/all?page=<?php echo $first; ?>" class="page_number"><?php echo $first; ?></a>
								<?php $pages = array_slice($numbers, $page - 2); ?>

								<?php foreach ($pages as $page) {
									?>
										<a href="/products/all?page=<?php echo $page; ?>" class="page_number"><?php echo $page; ?></a>
									<?php
								}
								?>
							<?php endif; ?>
								<?php if (intval($_GET['page']) < 17): ?>
									<span>.</span>
									<span>.</span>
									<span>.</span>
								<?php endif; ?>
							 	<a href="/products/all?page=<?php echo $last; ?>" class="page_number"><?php echo $last; ?></a>
								<div class="sledeca">
									<p><a href="#">Sledeca</a>></p>
								</div>
				  		</div>
					</main>	<!-- mainContainer end -->
					<?php else: ?>
						<div>
							<h1>Nemamo proizvod koji ste trazili</h1>
						</div>
					<?php endif ?>
				</div>	<!-- container-middle end -->
			</div>	<!-- container wrapper end -->

<script type="text/javascript" src="../../assets/javascript/search.js"></script>
