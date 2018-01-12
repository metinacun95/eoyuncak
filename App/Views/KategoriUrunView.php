

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Kategoriler</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						
							<?php 
								foreach ($getCategories as $category) {
									?>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title"><a href="<?php echo $link; ?>category/<?php echo $category->Sef; ?>.html"><?php echo $category->KategoriAdi ?></a></h4>
										</div>
									</div>

									<?php
								}
							 ?>
						<br>
					</div>
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"><?php echo $sef." Kategorisi" ?></h2>
						<?php 
							if(count($products) == 1){
								$product = $products[0];					
										?>

											<div class="col-sm-4">
												<div class="product-image-wrapper">
													<div class="single-products">
															<div class="productinfo text-center">
																<img src="<?php echo $link; ?>images/productImages/<?php echo $product->ResimYol; ?>" alt="" />
																<h2><?php echo $product->UrunFiyat; ?> ₺</h2>
																<p><?php echo $product->Baslik; ?></p>
																<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
															</div>
															<div class="product-overlay">
																<div class="overlay-content">
																	<h2><?php echo $product->UrunFiyat; ?> ₺</h2>
																	<p><?php echo $product->Baslik; ?></p>
																	<a href="<?php echo $link; ?>product/<?php echo $product->UrunId; ?>.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detaylı Gör</a>
																	<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
																</div>
															</div>
													</div>
													
												</div>
											</div>

										<?php
							}
							else{
								foreach ($products as $product) {				
										?>

											<div class="col-sm-4">
												<div class="product-image-wrapper">
													<div class="single-products">
															<div class="productinfo text-center">
																<img src="<?php echo $link; ?>images/productImages/<?php echo $product->ResimYol; ?>" alt="" />
																<h2><?php echo $product->UrunFiyat; ?> ₺</h2>
																<p><?php echo $product->Baslik; ?></p>
																<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
															</div>
															<div class="product-overlay">
																<div class="overlay-content">
																	<h2><?php echo $product->UrunFiyat; ?> ₺</h2>
																	<p><?php echo $product->Baslik; ?></p>
																	<a href="<?php echo $link; ?>product/<?php echo $product->UrunId; ?>.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detaylı Gör</a>
																	<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
																</div>
															</div>
													</div>
													
												</div>
											</div>

										<?php
								}
							}
						?>
						
					
						
					</div><!--features_items-->
					
					
					
					
					
				</div>
			</div>
		</div>
	</section>