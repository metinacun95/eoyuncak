<!-- /. NAV SIDE  -->
        <div id="page-wrapper">
			<div id="page-inner">
                <!-- #################################################### -->
				<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Siparişler</h1>
                        <h1 class="page-subhead-line">Bu sayfada siparişleri görebilirsiniz. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-6" style="width:100%;">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Siparişler
                        </div>
                        
                                <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                           
                                            <th>Ürün</th>
                                 			<th>Durum</th>
                                 			<th>Sipariş Tarihi</th>
                                 			<th>Kargo No</th>
                                 			<th>Öngörülen Teslim Tarihi</th>
                                 			<th>Teslim Tarihi</th>
                                 			
                                            <th>Düzenle</th>
											<th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>

										<?php 
											foreach($orders as $order){

												?>
												<tr class="success">
												
												<td><?php echo $order->UrunId ?></td>
												<td><?php echo $order->DurumId ?></td>
												<td><?php echo $order->SiparisTarihi; ?></td>
												<td><?php echo $order->KargoNo ?></td>
												<td><?php echo $order->OngorulenTeslimTarihi ?></td>
												<td><?php echo $order->TeslimTarihi ?></td>
												<td><a href="<?php echo $link; ?>admin/updateOrder/<?php echo $order->SiparisId; ?>.html"><i class="fa fa-retweet fa-2x"></i></a></td>
												<td><a href="<?php echo $link; ?>admin/deleteOrder/<?php echo $order->SiparisId; ?>.html" onclick="return silOnayla();"><i class="fa fa-trash-o fa-2x"></i></a></td>
												</tr>
												<?php
											}
										?>	
						
										<script type="text/javascript">
										function silOnayla()
										{
											return confirm("Bu siparişi silmek istediğinize emin misiniz?");
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