<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title><?php echo $title; ?></title>
<?php
		for($i = 0; $i<count($js); $i++){
		?>
	<script type="text/javascript" src="<?php echo $link."js/".$js[$i]; ?>?v=1.2"></script>
<?php
		}
		for($i = 0; $i<count($css); $i++){
		?>
	<link rel="stylesheet" href="<?php echo $link."css/".$css[$i]; ?>?v=1.2" />
<?php
		}
	?>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
	<link rel="icon" type="image/png" href="<?php echo $link; ?>images/icon.png" />
</head>
<body>
	<div class="main">
		<header class="header">
			<div class="center2">
				<div class="logo">
					<a href="<?php echo $link; ?>">
						<img src="<?php echo $link; ?>images/logo.png" alt="" />
					</a>
				</div>
				<menu class="menu">
					<ul>
						<li>Menü <span>+</span></li>
						<li><a href="<?php echo $link; ?>">Ana Sayfa</a></li>
						<li><a href="<?php echo $link; ?>whoWeAre.html">Biz Kimiz</a></li>
						<li><a href="<?php echo $link; ?>services.html">Hizmetlerimiz</a></li>
						<li><a href="<?php echo $link; ?>products.html">Ürünler</a></li>
						<li><a href="<?php echo $link; ?>referanslar.html">Referanslarımız</a></li>
						<li><a href="<?php echo $link; ?>bizeUlasin.html">Bize Ulaşın</a></li>
					</ul>
				</menu>
			</div>
		</header>