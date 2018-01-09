<!-- /. NAV SIDE  -->
        <div id="page-wrapper">
			<div id="page-inner">
                <!-- #################################################### -->
				<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Katalog Düzenle / Sil</h1>
                        <h1 class="page-subhead-line">Bu sayfada eklemiş olduğunuz katalogları
						düzenleyebilir veya kaldırabilirsiniz. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-6" style="width:100%;">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Kataloglar
                        </div>
                        
                                <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                           
                                            <th>Kategori Adı</th>
                                 
                                            <th>Düzenle</th>
											<th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>

											<?php 
												$girinti = 0;
												function kategori($p,$sub=0,$girinti){
													global $girinti,$link;
													foreach($p->getCategories($sub) as $category){
														?>
														<tr class="success">
														<?php
														
														$girinti++;
														?>

														<td><?php for($i=0;$i<$girinti;$i++){
															echo "#";
														} echo " ".$category->KategoriAdi; ?></td>
														<td><a href="<?php echo $link; ?>updateCategory/<?php echo $category->KategoriId; ?>.html"><i class="fa fa-retweet fa-2x"></i></a></td>
														<td><a href="<?php echo $link; ?>admin/deleteCategory/<?php echo $category->KategoriId; ?>.html" onclick="return silOnayla();"><i class="fa fa-trash-o fa-2x"></i></a></td>
													</tr> 
														<?php
														kategori($p,$category->KategoriId,$girinti);
														$girinti--;
													}

												}
												kategori($p,0,0);
												

											?>	
						
										<script type="text/javascript">
										function silOnayla()
										{
											return confirm("Bu kategori silmek istediğinize emin misiniz?");
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