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
<div id="page-wrapper">
			<div id="page-inner">
                <!-- #################################################### -->
				<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Kategori Düzenle</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-6" style="width:100%;">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">
                       
                        <div class="panel-heading">
                          Kategori Düzenle
                        </div>
							<div class="panel-body">
								<form action="" method="post">
									<b>Kategori Düzenle</b>
									<div class="urunStandart">
										<input type="text" name="yeniAd" value="<?php echo $category->KategoriAdi; ?>" />
									</div>
									<input type="submit" class="kaydetDiv" value="Kaydet" />
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