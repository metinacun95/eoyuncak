<!-- /. NAV SIDE  -->
        <div id="page-wrapper">
			<div id="page-inner">
                <!-- #################################################### -->
				<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Üye Düzenle / Sil</h1>
                        <h1 class="page-subhead-line">Bu sayfada üye bilgilerini
						düzenleyebilir veya kaldırabilirsiniz. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-6" style="width:100%;">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Üyeler
                        </div>
                        
                                <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                           
                                            
                                 			<th>Kullanıcı Adı</th>
                                 			<th>Ad</th>
                                 			<th>Soyad</th>
                                 			<th>Eposta</th>
                                 			<th>Kayıt Tarihi</th>
                                 			<th>Rol</th>
                                            <th>Düzenle</th>
											<th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>

										<?php 
											foreach($users as $user){

												?>
												<tr class="success">
												
												<td><?php echo $user->KullaniciAdi ?></td>
												<td><?php echo $user->Ad ?></td>
												<td><?php echo $user->Soyad; ?></td>
												<td><?php echo $user->Eposta ?></td>
												<td><?php echo $user->UyeKayitTarih ?></td>
												<td><?php echo $user->RolId ?></td>
												<td><a href="<?php echo $link; ?>admin/updateUser/<?php echo $user->UyeId; ?>.html"><i class="fa fa-retweet fa-2x"></i></a></td>
												<td><a href="<?php echo $link; ?>admin/deleteUser/<?php echo $user->UyeId; ?>.html" onclick="return silOnayla();"><i class="fa fa-trash-o fa-2x"></i></a></td>
												</tr>
												<?php
											}
										?>	
						
										<script type="text/javascript">
										function silOnayla()
										{
											return confirm("Bu üyeyi silmek istediğinize emin misiniz?");
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