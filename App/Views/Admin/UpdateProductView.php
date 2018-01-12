<style type="text/css">
	.kaydetDiv{
			width:100px;
			height:30px;
			padding:5px;
			color:#fff;
			background:green;
			text-align:center;
			margin-top:10px;
			border-radius:5px;
			cursor:not-allowed;
			border:0px;
			
		}
</style>
<!-- /. NAV SIDE  -->
        <div id="page-wrapper">
			<div id="page-inner">
                <!-- #################################################### -->
				<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Ürün Düzenle</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-6" style="width:100%;">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">
                       
                        <div class="panel-heading">
                           Ürün Düzenle
                        </div>
						<div class="panel-body">
							<form action="<?php echo $link; ?>addNewProduct.html" method="post">
								<b>Ürün Düzenle</b>
								<div class="urunStandart">
									Başlık : <input type="text" name="Baslik" value="<?php echo $product->Baslik; ?>" onKeyUp="inputKontrol()" onChange="inputKontrol()" /> <br />
									Ürün Açıklama : <textarea name="Aciklama" value="<?php echo $product->Aciklama; ?>" onKeyUp="inputKontrol()" onChange="inputKontrol()"></textarea> <br />
									Fiyat : <input type="text" name="UrunFiyat" value="<?php echo $product->UrunFiyat; ?>" onKeyUp="inputKontrol()" onChange="inputKontrol()" /> <br />
									Stok : <input type="text" name="Stok" value="<?php echo $product->Stok; ?>" onKeyUp="inputKontrol()" onChange="inputKontrol()" /> <br />
									Ürünün Resmi : <input type="file" name="urunResim" onKeyUp="inputKontrol()" onChange="inputKontrol()" />
								</div>
								<div class="ozellikler">
									Özellikler : <br />
									<?php
										$urunOzellikler = $p->query("SELECT * FROM urunozellikdegerler INNER JOIN urunozellikler ON urunozellikler.OzellikId=urunozellikdegerler.OzellikId WHERE UrunId='".$product->UrunId."'");
										foreach($urunOzellikler as $oz){
											if($oz->OzellikTip == 0){
												?>
												<?php echo $oz->OzellikAdi; ?> : <input type="text" name="detail-<?php echo $oz->OzellikId; ?>" value="<?php echo $oz->OzellikDeger; ?>" />
												<br />
												<?php
											}
											else{
											?>
											<?php echo $oz->OzellikAdi; ?> : <select name="detail-<?php echo $oz->OzellikId; ?>">
												<option value="0">Seçiniz</option>
												<?php
													$ozellikListe = $p->query("SELECT * FROM urunozellikliste WHERE UrunOzellikId='".$oz->OzellikId."'");
													foreach($ozellikListe as $ozl){
													?>
													<option value="<?php echo $ozl->UrunOzellikListeId; ?> <?php if($oz->OzellikDeger == $ozl->UrunOzellikListeId){ echo "selected"; } ?>"><?php echo $ozl->Ozellik ?></option>
													<?php
													}
												?>
											</select>
											<br />
											<?php
											}
										}
									?>
								</div>
								<input type="submit" value="Kaydet" class="kaydetDiv" />
							</form>
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