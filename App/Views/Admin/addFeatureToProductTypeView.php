<script type="text/javascript" src="<?php echo $link; ?>js/addFeatureToProductType.js"></script>
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
			border:0px;
		}
</style>
<div id="page-wrapper">
			<div id="page-inner">
                <!-- #################################################### -->
				<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Özellik Ekle</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-6" style="width:100%;">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">
                       
                        <div class="panel-heading">
                           Özellik Ekle
                        </div>
							<?php
								if($error == 1){
								?>
								<font color="green">Özellik eklendi. Devam edebilirsiniz</font>
								<?php
								}
								else if($error == 2){
								?>
								<font color="red">Özellik eklenemedi. Yeniden deneyin</font>
								<?php
								}
							?>
							<div class="panel-body">
								<form action="" method="post">
									<b>Özellik Ekle</b>
									<div class="urunStandart">
										Özellik Adı : <input type="text" name="OzellikAdi" onKeyUp="inputKontrol()" onChange="inputKontrol()" /> <br />
										Özellik Cins : <input type="text" name="OzellikCins" onKeyUp="inputKontrol()" onChange="inputKontrol()" /> <br />
										Özellik Alabilecek Değerler ( Optional ): <br /><textarea name="degerler" placeholder="Her bir seçeneği virgül ile ayırınız. Örnek : (değer1,değer2,değer3)"></textarea>
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