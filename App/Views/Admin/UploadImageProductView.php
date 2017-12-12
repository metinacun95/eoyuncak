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
                            Ürün Resim Ekleme
                        </div>
                                <div class="panel-body">
								<?php
									if(isset($error)){
										$errorMessage = "";
										if($error == 1){
											$errorMessage = "Sadece png ve jpeg dosyalar yüklenebilir";
										}
										
										
										?>
										<font color="red"><?php echo $errorMessage; ?></font>
										<?php
									}
								?>
								<form action="" method="post" enctype="multipart/form-data">
									<b>Ürüne Resim Ekleyiniz</b>
									Ürünün Resmi : <input type="file" name="urunResim" /> 
									<input type="submit" value="Yükle" />
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