<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yönetim Paneli</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
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
                            <img src="image/yorumkisisi.png" alt="Profil" class="img-thumbnail" />

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
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
			<div id="page-inner">
                <!-- #################################################### -->
<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Yönetici Ayarları</h1>
                        <h1 class="page-subhead-line">Yönetici giriş ayarlarınızı bu sayfadan ekleyebilirsiniz.</h1>

                    </div>
					<p style="text-align:center;font-size:22px;">İşlem sonucuna göre alınacak mesajlar aşağıdaki şekildedir.</p>
					<!-- BAŞARILI MESAJI -->
					<div id="basarili" class="col-md-4 " style="width:100%;">
						<div class="alert alert-success text-center">
							<h4>Bilgiler kaydedilmiştir. Lütfen bekleyin...</h4> 
							<hr />
							<i class="fa fa-warning fa-2x"></i>
						</div>
					</div>
					<!-- BAŞARILI MESAJI -->
					<!-- HATA MESAJI -->
					<div id="hata" class="col-md-4 " style="width:100%;">
						<div class="alert alert-warning text-center">
							<h4>Kayıt sırasında bir hata meydana geldi. Kayıt gerçekleştirilemedi !</h4> 
							<hr />
							<i class="fa fa-warning fa-2x"></i>
						</div>
					</div>
					<!-- HATA MESAJI -->
					<!-- HATA MESAJI -->
					<div id="hatap" class="col-md-4 " style="width:100%;">
						<div class="alert alert-warning text-center">
							<h4>Mevcut parola yanlış girildi. Lütfen tekrar deneyin !</h4> 
							<hr />
							<i class="fa fa-warning fa-2x"></i>
						</div>
					</div>
					<!-- HATA MESAJI -->
					<!-- HATA MESAJI -->
					<div id="hatau" class="col-md-4 " style="width:100%;">
						<div class="alert alert-warning text-center">
							<h4>Girmiş olduğunuz yeni parola birbiriyle uyuşmuyor. Lütfen tekrar deneyin !</h4> 
							<hr />
							<i class="fa fa-warning fa-2x"></i>
						</div>
					</div>
					<!-- HATA MESAJI -->
                </div>
                <!-- /. ROW  -->
                <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12" style="width:100%;">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           Yönetici Ayarları
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Yönetici Adı</label>
											<input  name="kullanici_adi" required class="form-control" type="text" pattern="[a-zA-Z0-9]{4,16}" title="Yönetici Adınız 5 ile 16 karekter uzunluğunda yalnızca harf veya rakamlardan oluşabilir." value="Kullanıcı Adı" required/>
                                            <p class="help-block">Yönetici Adınızı değiştirmek isterseniz yeni ad belirleyebilirsiniz.</p>
                                        </div>
										<div class="form-group">
                                            <label>Mevcut Parola</label>
                                            <input  name="parola" required class="form-control" type="password" required/>
                                            <p class="help-block">Mevcut parolanızı giriniz.</p>
                                        </div>
										<div class="form-group">
                                            <label>Yeni Parola</label>
                                            <input  name="yeni_parola" required class="form-control" pattern=".{6,12}" title="Parola en az 6 en fazla 12 karekterden oluşmalıdır !" type="password" required/>
                                            <p class="help-block">Yeni Parolanızı giriniz.</p>
                                        </div>
										<div class="form-group">
                                            <label>Yeni Parola (Tekrar)</label>
                                            <input  name="yeni_parola2" required class="form-control" pattern=".{6,12}" title="Parola en az 6 en fazla 12 karekterden oluşmalıdır !" type="password" required/>
                                            <p class="help-block">Parolayı tekrar giriniz.</p>
                                        </div>
                                 
                                        <input type="submit" class="btn btn-info" value="Bilgilerimi Kaydet"/>

                                    </form>
									
                            </div>
                        </div>
                            </div>
				</div>
					   
				<!-- #################################################### -->	
			</div>
			<!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        &copy; 2016 | Design By : <a href="http://www.metinacun.com" target="_blank">Metin ACUN</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    


</body>
</html>