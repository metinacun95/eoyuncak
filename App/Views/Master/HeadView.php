<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>
<?php
		for($i = 0; $i<count($js); $i++){
		?>
	<script type="text/javascript" src="<?php echo $link."js/".$js[$i]; ?>?v=<?php echo time(); ?>"></script>
<?php
		}
		for($i = 0; $i<count($css); $i++){
		?>
	<link rel="stylesheet" href="<?php echo $link."css/".$css[$i]; ?>?v=<?php echo time(); ?>" />
<?php
		}
	?>
	<script type="text/javascript" src="<?php echo $link; ?>js/jquery.js"></script>
	<script type="text/javascript">
		var link = "<?php echo $link; ?>";
	</script>
</head>
<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i><?php echo $iletisim["telno"]; ?></a></li>
								<li><a href="mailto:<?php echo $iletisim["email"]; ?>"><i class="fa fa-envelope"></i> <?php echo $iletisim["email"]; ?></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="<?php echo $iletisim["facebook"]; ?>"><i class="fa fa-facebook"></i></a></li>
								<li><a href="<?php echo $iletisim["twitter"]; ?>"><i class="fa fa-twitter"></i></a></li>
								<li><a href="mailto:<?php echo $iletisim["email"]; ?>"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo $link; ?>"><img src="<?php echo $link; ?>images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							<?php
								if($isLogin){
								?>
								<li><a href="<?php echo $link; ?>profile.html">Hoşgeldin, <?php echo $_SESSION["userName"] ?></a></li>
								<li><a href="<?php echo $link; ?>profile.html"><i class="fa fa-user"></i> Hesap</a></li>
								<?php
								}
							?>
								<li><a href="<?php echo $link; ?>cart.html"><i class="fa fa-shopping-cart"></i> Sepetim (<?php if(isset($_SESSION["userId"]))echo $cartCount; else echo 0; ?>)</a></li>
								<?php 
									 
									if($isLogin){
										?>
											<li><a href="<?php echo $link; ?>logout.html"><i class="fa fa-sign-out"> Çıkış Yap</i></a></li>
										<?php
									}else{
										?>
											<li><a href="<?php echo $link; ?>login.html"><i class="fa fa-lock"></i> Giriş Yap</a></li>
										<?php
									}
								?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo $link; ?>" class="active">Anasayfa</a></li>
								<li class="dropdown"><a href="#">Kategoriler<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<?php
											foreach($cats as $c){
											?>
											<li><a href="<?php echo $link; ?>category/<?php echo $c->Sef; ?>.html"><?php echo $c->KategoriAdi; ?></a></li>
											<?php
											}
										?>
                                    </ul>
                                </li>
                                <li><a href="<?php echo $link; ?>hakkimizda.html">Hakkımızda</a></li>
								<li><a href="<?php echo $link; ?>iletisim.html">İletişim</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<form action="<?php echo $link; ?>search" method="post">
							<div class="search_box pull-right">
								<input type="text" placeholder="Ara"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->