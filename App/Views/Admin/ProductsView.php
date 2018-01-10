<!-- /. NAV SIDE  -->
        <div id="page-wrapper">
			<div id="page-inner">
                <!-- #################################################### -->
				<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Ürün Düzenle / Sil</h1>
                        <h1 class="page-subhead-line">Bu sayfada eklemiş olduğunuz ürünleri
						düzenleyebilir veya kaldırabilirsiniz. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-6" style="width:100%;">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Ürünler
                        </div>
                        
                                <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                           
                                            <th>Ürün Resim</th>
                                 			<th>Başlık</th>
                                 			<th>Açıklama</th>
                                 			<th>Kategori</th>
                                 			<th>Fiyat</th>
                                 			<th>Stok</th>
                                 			<th>Satın Alınma</th>
                                            <th>Düzenle</th>
											<th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>

										<?php 
											foreach($products as $product){

												?>
												<tr class="success">
												<td><img height="70" width="100" src="<?php echo $link; ?>images/productImages/<?php echo $product->ResimYol ?>" alt=""></td>
												<td><?php echo $product->Baslik ?></td>
												<td><?php echo $product->Aciklama ?></td>
												<td><?php echo $p->getCategory($product->KategoriId)->KategoriAdi; ?></td>
												<td><?php echo $product->UrunFiyat ?></td>
												<td><?php echo $product->Stok ?></td>
												<td><?php echo $product->ToplamSatinAlinma ?></td>
												<td><a href="<?php echo $link; ?>admin/updateProduct/<?php echo $product->UrunId; ?>.html"><i class="fa fa-retweet fa-2x"></i></a></td>
												<td><a href="<?php echo $link; ?>admin/deleteProduct/<?php echo $product->UrunId; ?>.html" onclick="return silOnayla();"><i class="fa fa-trash-o fa-2x"></i></a></td>
												</tr>
												<?php
											}
										?>	
						
										<script type="text/javascript">
										function silOnayla()
										{
											return confirm("Bu ürünü silmek istediğinize emin misiniz?");
										}
										</script>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
                </div>
            </div>
                <!-- /. ROW  -->
					   
				<!-- #################################################### -->	
			</div>
			<!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->