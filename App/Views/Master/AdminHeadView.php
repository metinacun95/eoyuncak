<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>
<?php
		for($i = 0; $i<count($js); $i++){
		?>
	<script type="text/javascript" src="<?php echo $link."admin_assets/".$js[$i]; ?>?v=<?php echo time(); ?>"></script>
<?php
		}
		for($i = 0; $i<count($css); $i++){
		?>
	<link rel="stylesheet" href="<?php echo $link."admin_assets/".$css[$i]; ?>?v=<?php echo time(); ?>" />
<?php
		}
	?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<script type="text/javascript" src="<?php echo $link; ?>js/jquery.js"></script>
	<script type="text/javascript">
		var link = "<?php echo $link; ?>";
	</script>
</head>
<body>
<div id="wrapper">
	<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SİTE ADI</a>
            </div>

            <div class="header-right">
                <a href="mesajlar.php" class="btn btn-info" title="Yeni Mesaj"><b> 5 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="#" class="btn btn-primary" title="#"><b>0 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="cikis.php" class="btn btn-danger" title="Çıkış"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="<?php echo $link."admin_assets/"; ?>image/yorumkisisi.png" alt="Profil" class="img-thumbnail" />

                            <div class="inner-text">
                                Kullanıcı Adı
                            <br />						
                                <small>Son Görülme : 01 Ocak 2016 Cuma, 00:00:00</small>
                            </div>
                        </div>

                    </li>
					<li>
                        <a class="active-menu" href="index.php"><i class="fa fa-home "></i>Anasayfa</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-reply-all "></i>Siteye Git</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-puzzle-piece "></i>Kataloglar<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="katalog_ekle.php"><i class="fa fa-plus"></i>Yeni Katalog Ekle</a>
                            </li>
                            <li>
                                <a href="kataloglar.php"><i class="fa fa-cogs "></i>Katalog Düzenle/Sil</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-th "></i>Ürünler<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="urun_ekle.php"><i class="fa fa-plus"></i>Yeni Ürün Ekle</a>
                            </li>
                            <li>
                                <a href="urunler.php"><i class="fa fa-cogs "></i>Ürün Düzenle/Sil</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-list-alt "></i>Kategoriler<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="kategori_ekle.php"><i class="fa fa-plus"></i>Yeni Kategori Ekle</a>
                            </li>
                            <li>
                                <a href="kategoriler.php"><i class="fa fa-cogs "></i>Kategori Düzenle/Sil</a>
                            </li>                                                   
                        </ul>
                    </li>
                   <li>
                        <a href="#"><i class="fa fa-windows "></i>Kurumsal<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="hakkimizda.php"><i class="fa fa-flickr"></i>Hakkımizda</a>
                            </li>                       
                        </ul>
                    </li>
					<li>
                        <a href="iletisim.php"><i class="fa fa-phone "></i>İletişim Bilgileri</a>  
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-user "></i>Yönetici İşlemleri <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                           
                             <li>
                                <a href="sifre_degistir.php"><i class="fa fa-key "></i>Şifre Değiştir</a>
                            </li>                     
                        </ul>
                    </li>
					<li>
                        <a href="site_ayarlari.php"><i class="fa fa-cog "></i>Site Ayarları</a>  
                    </li>
                </ul>

            </div>

        </nav>