
			<div class="containerMiddle">
				<aside class="asideContainer">
					<h3>Filter</h3>
					<div class="search">
						<form>
							<!-- <label>Pretrazi</label> -->
							<input type="text" name="search" placeholder="Pretrazi">
							<img class="fa fa-search" src="<?php echo WEBROOT; ?>/assets/css/pictures/search.png">
						</form>
					</div>
					<!-- filter -->
					<form class="listForm" name="sortProducts">
						<input type="checkbox" name="productType[]" value="1">Hidračna Creva <br>
						<input type="checkbox" name="productType[]" value="2">Vazdušna Creva <br>
						<input type="checkbox" name="productType[]" value="3">Čaure <br>
						<input type="checkbox" name="productType[]" value="4">Spojnice <br>
						<input type="checkbox" name="productType[]" value="5">Podloške <br>
						<input type="checkbox" name="productType[]" value="6">Šuplji vijci <br>
						<input type="checkbox" name="productType[]" value="7">Reduciri <br>
						<input class="listFormtBtn" type="submit" name="filter">
					</form>
				</aside>	<!-- asideContainer end -->
				<main class="mainContainer">
					<h1>Proizvodi</h1>

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
			</div>	<!-- container-middle end -->
			
<script type="text/javascript" src="../../assets/javascript/search.js"></script>