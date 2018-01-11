 <div id="page-wrapper">
			<div id="page-inner">
                <!-- #################################################### -->
				<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">İletişim Bilgileri</h1>
                        <h1 class="page-subhead-line">İletişim bilgilerinizi bu sayfadan ekleyebilirsiniz.</h1>

                    </div>
					
                </div>
                <!-- /. ROW  -->
                <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12" style="width:100%;">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           İletişim Bilgileri
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="" >
                                        <div class="form-group">
                                            <label>Telefon Numarası</label>
                                            <input  name="telno" required class="form-control" maxlength="15" type="tel" value="<?php echo $iletisim['telno']; ?>" required/>
                                            <p class="help-block">Telefon Numaranızı girin.</p>
                                        </div>
										<div class="form-group">
                                            <label>E-Mail Adresiniz</label>
                                            <input  name="email" required class="form-control" maxlength="60" type="email" value="<?php echo $iletisim['email']; ?>" required/>
                                            <p class="help-block">E-Mail adresinizi girin.</p>
                                        </div>
										<div class="form-group">
                                            <label>Facebook Adresiniz</label>
                                            <input  name="facebook" required class="form-control" type="url" value="<?php echo $iletisim['facebook']; ?>" required/>
                                            <p class="help-block">Facebook adresinizi girin.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Twitter Adresiniz</label>
                                            <input  name="twitter" required class="form-control" type="url" value="<?php echo $iletisim['twitter']; ?>" required/>
                                            <p class="help-block">Twitter adresinizi girin.</p>
                                        </div>


                                        							
                                 
                                        <input type="submit" class="btn btn-info" value="Bilgileri Kaydet"/>

                                    </form>									
                            </div>
                        </div>
                            </div>
				</div>
					   
				<!-- #################################################### -->	
			</div>
			<!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->