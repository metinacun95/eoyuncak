<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center"><?php echo $_SESSION["userName"]; ?></strong></h2>    			    				    				
					
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-12">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Profil Bilgileriniz</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form action="profileUpdate.html" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				    		<div class="form-group col-md-12">
				                <input type="text" name="KullaniciAdi" value="<?php echo $user->KullaniciAdi; ?>" class="form-control" disabled required="required" placeholder="Adınız" maxlength="20">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="Ad" value="<?php echo $user->Ad; ?>" class="form-control" required="required" placeholder="Adınız" maxlength="20">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="Soyad" value="<?php echo $user->Soyad; ?>" class="form-control" required="required" placeholder="Adınız" maxlength="20">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="Eposta" value="<?php echo $user->Eposta; ?>" class="form-control" required="required" placeholder="Email adresiniz" maxlength="100">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="Adres" id="message" required="required" class="form-control" rows="8" maxlength="1000" placeholder="Teslimat Adresi"><?php echo $user->Adres; ?></textarea>
				            </div>
				            <div class="form-group col-md-6">
				                <input type="password" name="mevcutparola"  class="form-control"  placeholder="Mevcut Parolanız" maxlength="20">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="password" name="yeniparola"  class="form-control"  placeholder="Yeni Parola" maxlength="100">
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Gönder">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->