<script type="text/javascript" src="<?php echo $link; ?>js/signUp.js"></script>
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<?php 
							if(isset($_SESSION['FLASH_LOGIN'])){
								foreach($_SESSION['FLASH_LOGIN'] as $hata){
									echo "<p style='color:red'>".$hata."</p>";
								}
								unset($_SESSION["FLASH_LOGIN"]);						
							}
						?>
						<h2>Giriş Yap</h2>
						<form action="login.html" method="post">
							<input type="text" name="username" placeholder="Kullanıcı adı veya email" />
							<input type="password" name="password" placeholder="Şifre" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Oturumumu açık tut
							</span>
							<button type="submit" class="btn btn-default">Giriş</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">VEYA</h2>
				</div>
				<div class="col-sm-4">
					<?php 
							if(isset($_SESSION['FLASH_SIGNUP'])){
								foreach($_SESSION['FLASH_SIGNUP'] as $hata){
									echo "<p style='color:red'>".$hata."</p>";
								}
								unset($_SESSION["FLASH_SIGNUP"]);						
							}
						?>
					<div class="signup-form"><!--sign up form-->
						<h2>Kayıt Ol</h2>
						<form action="signUp.html" method="post">
							<input type="text" placeholder="Ad" name="Ad"/>
							<input type="text" placeholder="Soyad" name="Soyad"/>
							<input type="text" placeholder="KullaniciAdi" name="KullaniciAdi"/>
							<input type="email" placeholder="Email Address" name="Eposta"/>
							<input type="password" placeholder="Şifre" name="Parola"/>
							<button type="submit" class="btn btn-default">Kayıt Ol</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->