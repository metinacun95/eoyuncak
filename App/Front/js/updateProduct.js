var kaydedilebilir = false;
$(document).ready(function(){
	
});
function getFeatures(){
	
}
function cat(obj){
	obj = $(obj);
	var sub = obj.val();
	$.ajax({
		"url":link+"tnewProductAjax",
		"type":"post",
		"data":{"i":"getCategories","sub":sub},
		"dataType":"json",
		success:function(result){
			if(typeof(result["categoryGroup"]) != "undefined"){
				result = result["categoryGroup"];
				if(result.length > 0){
					var add = "";
					for(var i=0; i<result.length;i++){
						categoryGroup = result[i];
						addAppend = '<select onChange="cat(this)" name="KategoriId">'; 
						addAppend = addAppend + '<option value="0">Seçiniz</option>';
						$.each(categoryGroup,function(key,value){
							if(key != "selected"){
								addAppend = addAppend + '<option value="'+value.KategoriId+'">'+value.KategoriAdi+'</option>';
							}
							else{
								
							}
						});
						addAppend = addAppend+ "</select> <br />";
						add = add + addAppend;
					}
					add = "KATEGORİLER : <br />" + add;
					$(".kategoriler").html(add);
					saveSelecteds(result);
					$(".ozellikler").html("");
				}
			}
			else if(typeof(result["productTypes"]) != "undefined"){
				var productTypes = result["productTypes"];
				var add = 'Ürün Tipler : <br /> <select onChange="selectType(this)"  name="UrunTip">';
				add = add + '<option value="0">Seçiniz</option>'
				for(var i=0; i<productTypes.length;i++){
					add = add + '<option value="'+productTypes[i]["UrunTipId"]+'">'+productTypes[i]["UrunTipAdi"]+'</option>';
				}
				add = add + "</select> <br />";
				$(".urunTipler").html(add);
			}
		},
		error:function(result){
			console.log("error : ");
			console.log(result);
		}
	});
}
function saveSelecteds(result){
	$(document).ready(function(){
		for(var i=0; i<result.length;i++){
			categoryGroup = result[i];
			$.each(categoryGroup,function(key,value){
				$(".kategoriler option[value='"+value.Alt+"']").attr("selected",true);
			});
		}
	});
}
function selectType(obj){
	var obj = $(obj);
	$.ajax({
		"type":"post",
		"url":link+"tnewProductAjax",
		"data":{"i":"getDetails","productType":obj.val()},
		"dataType":"json",
		"success":function(result){
			var add = "Özellikler : <br />";
			for(var i=0;i<result.length;i++){
				if(result[i]["tip"] == 0){
					add = add + result[i]["ad"]+' : <input type="text" name="detail-'+result[i]["id"]+'" placeholder="'+result[i]["cins"]+'" onKeyUp="inputKontrol()" onChange="inputKontrol()"/> <br />';
				}
				else if(result[i]["tip"] == 1){
					add = add + result[i]["ad"] + '<select name="detail-'+result[i]["id"]+'" onKeyUp="inputKontrol()" onChange="inputKontrol()">';
					add = add + '<option value="0">'+result[i]["ad"]+' Seçin</option>';
					for(var j = 0; j<result[i]["ozellikler"].length;j++){
						add = add + '<option value="'+result[i]["ozellikler"][j].UrunOzellikListeId+'">'+result[i]["ozellikler"][j].Ozellik+'</option>';
					}
					add = add +"</select> <br />";
				}
			}
			$(".ozellikler").html(add);
		}
	});
}
function inputKontrol(){
	var inputs = $(".ozellikler input");
	var selects = $(".ozellikler select");
	var kontrol = true;
	if(inputs.length > 0 | selects.length > 0){
		kontrol = false;
		for(var i=0;i<inputs.length;i++){
			var input = $(".ozellikler input:eq("+i+")");
			if(input.val() == ""){
				kontrol = true; break;
			}
		}
		for(var i=0;i<selects.length;i++){
			var select = $(".ozellikler select:eq("+i+")");
			if(select.val() == ""){
				kontrol = true; break;
			}
		}
		if($("input[name='Baslik']").val() == ""){ kontrol = true; }
		if($("input[name='Aciklama']").val() == ""){ kontrol = true; }
		if($("input[name='UrunFiyat']").val() == ""){ kontrol = true; }
		if($("input[name='Stok']").val() == ""){ kontrol = true; }
		if($("input[name='urunResim']").val() == ""){ kontrol = true; }
		if(!kontrol){
			$(".kaydetDiv").css({"background":"green","cursor":"pointer"});
		}
		else{
			$(".kaydetDiv").css({"background":"#ccc","cursor":"not-allowed"});
		}
	}
	return !kontrol;
}
function kaydet(){
	if(inputKontrol()){
		$(document).ready(function(){
			var data = $("form").serialize();
			$.ajax({
				"type":"post",
				"url":link+"addNewProduct.html",
				"data":data,
				"dataType":"json",
				success:function(result){
					console.log(result);
					if(result.error == 0){
						alert("Ürün başarıyla eklendi");
						window.location = link+"admin/uploadImageProduct/"+result.productId+".html";
					}
					else{
						alert(result.errorMessage);
					}
				},
				error:function(result){
					console.log(result);
				}
			});
		});
	}
	else{
		alert("Lütfen tüm alanları doldurun");
	}
}