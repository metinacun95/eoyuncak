<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Ürün</td>
							<td class="description"></td>
							<td class="price">Fiyat</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php 
							for($i=0;($i<count($carts) & !isset($carts["error"]));$i++){
								$cart = $carts[$i]->UrunId;
								$product = $p->get(intval($cart));
								?>

							<tr>
							<td class="cart_product">
								
								<a href="<?php echo $link; ?>/product/<?php echo $product->UrunId; ?>.html"><img style="width:200px;height:auto;" src="<?php echo $link; ?>images/productImages/<?php echo $product->ResimYol; ?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $product->Baslik; ?></a></h4>
								
							</td>
							<td class="cart_price">
								<p><?php echo $product->UrunFiyat; ?></p>
							</td>
							<td class="cart_quantity">
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $product->UrunFiyat; ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="deleteCart/<?php echo $product->UrunId; ?>.html"><i class="fa fa-times"></i></a>
							</td>
						</tr>
								<?php
							}

						?>
						

						
					</tbody>
				</table>
				<?php
				if(!isset($carts["error"])){ ?>
				<a href="<?php echo $link; ?>pay.html"><button type="button" class="btn btn-primary" style="width:100%;">Ödemeyi Gerçekleştir</button></a>
				<?php } ?>
			</div>
		</div>
	</section> <!--/#cart_items-->