<script type="text/javascript" src="<?php echo $link; ?>js/newProduct.js"></script>
<style type="text/css">
	.kaydetDiv{
			width:100px;
			height:30px;
			padding:5px;
			color:#fff;
			background:#ccc;
			text-align:center;
			margin-top:10px;
			border-radius:5px;
			cursor:not-allowed;
		}
</style>
<!-- /. NAV SIDE  -->
        <div id="page-wrapper">
			<div id="page-inner">
                <!-- #################################################### -->
				<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Ürün Ekle</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-6" style="width:100%;">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Yeni Ürün Ekle
                        </div>
                        
                                <div class="panel-body">
								<form action="<?php echo $link; ?>addNewProduct.html" method="post">
								<b>Ürün Ekle</b>
								<div class="urunStandart">
									Başlık : <input type="text" name="Baslik" onKeyUp="inputKontrol()" onChange="inputKontrol()" /> <br />
									Ürün Açıklama : <textarea name="Aciklama" onKeyUp="inputKontrol()" onChange="inputKontrol()"></textarea> <br />
									Fiyat : <input type="text" name="UrunFiyat" onKeyUp="inputKontrol()" onChange="inputKontrol()" /> <br />
									Stok : <input type="text" name="Stok"  onKeyUp="inputKontrol()" onChange="inputKontrol()" /> <br />
									<!-- Ürünün Resmi : <input type="file" name="urunResim" onKeyUp="inputKontrol()" onChange="inputKontrol()" /> -->
								</div>
								<div class="kategoriler">
									
								</div>
								<div class="urunTipler">
									
								</div>
								<div class="ozellikler">
									
								</div>
								<div class="kaydetDiv" onClick="kaydet()">
									Kaydet
								</div>
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