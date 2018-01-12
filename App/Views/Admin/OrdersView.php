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
											<th></th>
                                            <th>Ürün</th>
                                 			<th>Durum</th>
                                 			<th>Sipariş Tarihi</th>
											<th>Adres</th>
											<th>Gönderildi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

										<?php 
											foreach($orders as $order){

												?>
												<tr class="success">
												<td><img style="width:200px;height:auto;" src="<?php echo $link; ?>images/productImages/<?php echo $order->ResimYol; ?>" alt=""></td>
												<td><?php echo $order->UrunId ?></td>
												<td><?php echo $order->DurumId ?></td>
												<td><?php echo $order->SiparisTarihi; ?></td>
												<td><?php echo $order->Adres; ?></td>
												<td><a href="<?php echo $link; ?>admin/sendOrder/<?php echo $order->SiparisId; ?>.html" onclick="return onayla();">Gönderildi</a></td>
												</tr>
												<?php
											}
										?>	
						
										<script type="text/javascript">
										function onayla()
										{
											return true;
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