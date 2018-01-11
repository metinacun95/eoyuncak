<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">İletişim</strong></h2>    			    				    				
					
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Formu doldurarak iletişime geçebilirsiniz.</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Adınız" maxlength="20">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email adresiniz" maxlength="100">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Konu" maxlength="100">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" maxlength="1000" placeholder="Mesajınız..."></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Gönder">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">İletişim Bilgileri</h2>
	    				<address>
	    					<p>E-Oyuncak</p>
							<p>Tel: <?php echo $iletisim["telno"]; ?></p>
							<p>Email: <?php echo $iletisim["email"]; ?></p>
							<p>Facebook: <?php echo $iletisim["facebook"]; ?></p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="<?php echo $iletisim["facebook"]; ?>"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="<?php echo $iletisim["twitter"]; ?>"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="<?php echo $iletisim["email"]; ?>"><i class="fa fa-google-plus"></i></a>
								</li>
								
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->