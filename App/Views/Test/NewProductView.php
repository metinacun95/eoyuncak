<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Yeni Ürün Ekleme Test</title>
	<script type="text/javascript" src="<?php echo $link; ?>js/jquery.js"></script>
	<script type="text/javascript">
		var link = "<?php echo $link; ?>";
	</script>
	<script type="text/javascript" src="<?php echo $link; ?>js/newProduct.js"></script>
	<style type="text/css">
		.kaydetDiv{
			width:100px;
			height:20px;
			padding:5px;
			color:#fff;
			background:#ccc;
			text-align:center;
			margin-top:10px;
			border-radius:5px;
			cursor:not-allowed;
		}
		#progress-wrp {
			border: 1px solid #0099CC;
			padding: 1px;
			position: relative;
			height: 30px;
			border-radius: 3px;
			margin: 10px;
			text-align: left;
			background: #fff;
			box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
		}
		#progress-wrp .progress-bar{
			height: 100%;
			border-radius: 3px;
			background-color: #f39ac7;
			width: 0;
			box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
		}
		#progress-wrp .status{
			top:3px;
			left:50%;
			position:absolute;
			display:inline-block;
			color: #000000;
		}
	</style>
</head>
<body>
	<form action="<?php echo $link; ?>addNewProduct.html" method="post">
		<b>Ürün Ekleme Test</b>
		<div class="urunStandart">
			Başlık : <input type="text" name="Baslik" onKeyUp="inputKontrol()" onChange="inputKontrol()" /> <br />
			Ürün Açıklama : <textarea name="Aciklama" onKeyUp="inputKontrol()" onChange="inputKontrol()"></textarea> <br />
			Fiyat : <input type="text" name="UrunFiyat" onKeyUp="inputKontrol()" onChange="inputKontrol()" /> <br />
			Stok : <input type="text" name="Stok"  onKeyUp="inputKontrol()" onChange="inputKontrol()" /> <br />
			<!-- Ürünün Resmi : <input type="file" name="urunResim" onKeyUp="inputKontrol()" onChange="inputKontrol()" /> -->
		</div>
		<div class="kategoriler">
			
		</div>
		<div class="urunTipler">
			
		</div>
		<div class="ozellikler">
			
		</div>
		<div class="kaydetDiv" onClick="kaydet()">
			Kaydet
		</div>
	</form>
	<div id="progress-wrp">
		<div class="progress-bar"></div>
		<div class="status">0%</div>
	</div>
</body>
</html>