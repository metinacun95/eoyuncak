<script type="text/javascript" src="<?php echo $link; ?>js/newProductType.js"></script>
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
                            Yeni Kategori Ekle
                        </div>
							<div class="panel-body">
								<form action="" method="post">
									<b>Ürün Tipi Ekle</b>
									<div class="urunStandart">
										Ürün Tip Adı : <input type="text" name="TipAdi" onKeyUp="inputKontrol()" onChange="inputKontrol()" /> <br />
									</div>
									<div class="kategoriler">
										
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