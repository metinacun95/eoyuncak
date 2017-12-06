<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yönetim Paneli</title>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- PAGE LEVEL STYLES -->
    <link href="assets/css/bootstrap-fileupload.min.css" rel="stylesheet" />
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
                        <h1 class="page-head-line">Yeni Ürün Ekle</h1>
                        <h1 class="page-subhead-line">Ürün bilgilerini girerek yeni ürün ekleyebilirsiniz.</h1>

                    </div>
					<p style="text-align:center;font-size:22px;">İşlem sonucuna göre alınacak mesajlar aşağıdaki şekildedir.</p>
					<!-- BAŞARILI MESAJI -->
					<div id="basarili" class="col-md-4 " style="width:100%;">
						<div class="alert alert-success text-center">
							<h4>Ürün başarı ile eklenmiştir.</h4> 
							<hr />
							<i class="fa fa-warning fa-2x"></i>
						</div>
					</div>
					<!-- BAŞARILI MESAJI -->
					<!-- HATA MESAJI -->
					<div id="hata" class="col-md-4 " style="width:100%;">
						<div class="alert alert-warning text-center">
							<h4>Kayıt sırasında bir hata meydana geldi.Kayıt gerçekleştirilemedi !</h4> 
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
                           Ürün Bilgileri
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Ürün Adı</label>
                                            <input  name="urun_adi" class="form-control" type="text" required />
                                            <p class="help-block">Ürün Adı giriniz.</p>
                                        </div>		
										<div class="form-group">
											<label class="control-label col-lg-4" style="margin-left:-15px;width:100%;line-height:40px;">Ürün Resmi</label>
											<div class="">
												<div class="fileupload fileupload-new" data-provides="fileupload">
													<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/img/demoUpload.jpg" alt="" /></div>
													<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
													<div style="margin-top:20px;">
														<span class="btn btn-file btn-primary"><span class="fileupload-new" >Resim Seç</span><span class="fileupload-exists">Değiştir</span><input type="file" name="resim" required/></span>
														<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Temizle</a>
													</div>
												</div>
											</div>
										</div>										
										<div class="form-group">
                                            <label>Ürün Kategorisi</label>
                                            <select name="kategori" class="form-control">
													<option>Kategori 1</option>
													<option>Kategori 2</option>
													<option>Kategori 3</option>
													<option>Kategori 4</option>
													<option>Kategori 5</option>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Ürün Anasayfada(Slider'da) Görünsün mü ?</label>
                                            <select name="anaekran" class="form-control">
													<option>Hayır</option>
													<option>Evet</option>												
                                            </select>
                                        </div>
                                        <input type="submit" class="btn btn-info" value="Hizmeti Ekle"/>

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
	<!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/js/bootstrap-fileupload.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    


</body>
</html>