			<?php $checked = isset($_GET['productType']) ? $_GET['productType'] : array(); ?>
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
						<?php foreach ($this->data['products'] as $product) : ?> 
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
				  		<!-- <a href="#">Prethodna</a>
				  		<a href="#">Sledeca</a> --> 		
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