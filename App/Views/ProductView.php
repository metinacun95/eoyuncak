

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
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo $link; ?>images/productImages/<?php echo $product->ResimYol; ?>" alt="" />
								
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <!-- <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										
									</div> -->

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $product->Baslik; ?></h2>
								<p>Web ID: 1089772</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>TL ₺<?php echo $product->UrunFiyat; ?></span>
									<form action="<?php echo $link; ?>addcart.html" method="post">
									<label>Adet:</label>
									<input type="hidden" name="tutar" value="<?php echo $product->UrunFiyat; ?>">
									<input type="hidden" name="urunId" value="<?php echo $product->UrunId; ?>">
									<input type="text" name="adet" value="1" />
									<input type="submit" style="width:200px;height:60px;" class="btn btn-fefault cart" value="Sepete Ekle">
										
									</form>
								</span>
								<p><b>Stok:</b> <?php echo $product->Stok; ?></p>
								
							
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Detaylar</a></li>
								
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<div class="col-sm-12">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<h4><?php echo $product->Baslik; ?></h4>
												<p><?php echo $product->Aciklama; ?></p>

											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div><!--/category-tab-->
					
					
					
				</div>
			</div>
		</div>
	</section>