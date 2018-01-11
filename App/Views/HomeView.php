<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-OYUNCAK</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-OYUNCAK</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-OYUNCAK</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->

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
						<h2 class="title text-center">Popüler Oyuncaklar</h2>
						<?php 
							foreach ($mostPays as $mostPay) {
								?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
													<div class="productinfo text-center">
														<img src="<?php echo $link; ?>images/productImages/<?php echo $mostPay->ResimYol; ?>" alt="" />
														<h2><?php echo $mostPay->UrunFiyat; ?> ₺</h2>
														<p><?php echo $mostPay->Baslik; ?></p>
														<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
													</div>
													<div class="product-overlay">
														<div class="overlay-content">
															<h2><?php echo $mostPay->UrunFiyat; ?> ₺</h2>
															<p><?php echo $mostPay->Baslik; ?></p>
															<a href="<?php echo $link; ?>product/<?php echo $mostPay->UrunId; ?>.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detaylı Gör</a>
															<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
														</div>
													</div>
											</div>
											
										</div>
									</div>

								<?php
							}
						?>
						
					
						
					</div><!--features_items-->
					<?php 

						


					?>
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<?php 
								$i=0;
								$kategoriler = [];
								$sayac=0;
								foreach ($getCategories as $category) {
									?>
									<li class="<?php if($i==0) echo "active";$i++; ?>"><a href="#<?php echo $category->Sef; ?>" data-toggle="tab"><?php echo $category->KategoriAdi; ?></a></li>
										
									<?php
									$kategoriler[$sayac]=$category->Sef;
									$sayac++;
								}
							 ?>
								
							</ul>
						</div>
						<div class="tab-content">
							<?php 
								
								for($i=0;$i<count($kategoriler);$i++){
									if($i==0){
									?>
										<div class="tab-pane fade active in" id="<?php echo $kategoriler[$i]; ?>" >
											<?php 
												foreach($products as $product){
												
													if( $p->kategoriBul($product->KategoriId)==$kategoriler[$i]){
														?>
														<div class="col-sm-3">
															<div class="product-image-wrapper">
																<div class="single-products">
																	<div class="productinfo text-center">
																		<img src="<?php echo $link; ?>images/productImages/<?php echo $product->ResimYol; ?>" alt="" />
																		<h2><?php echo $product->UrunFiyat; ?> ₺</h2>
																		<p><?php echo $product->Baslik; ?></p>
																		<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
																	</div>
																	
																</div>
															</div>
														</div>
														<?php
													}
												}

											?>
											
											
										</div>

									<?php
									}else{
										?>
										<div class="tab-pane fade" id="<?php echo $kategoriler[$i]; ?>" >
											<?php 
												foreach($products as $product){
													
													if( $p->kategoriBul($product->KategoriId)==$kategoriler[$i]){
														?>
														<div class="col-sm-3">
															<div class="product-image-wrapper">
																<div class="single-products">
																	<div class="productinfo text-center">
																		<img src="images/home/gallery1.jpg" alt="" />
																		<h2><?php echo $product->UrunFiyat; ?></h2>
																		<p>Easy Polo Black Edition</p>
																		<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
																	</div>
																	
																</div>
															</div>
														</div>
														<?php
													}
												}

											?>
											
											
										</div>

									<?php
									}
								}
							?>
						</div>
					</div><!--/category-tab-->
					
					
					
					
				</div>
			</div>
		</div>
	</section>