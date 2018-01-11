var kaydedilebilir = false;
$(document).ready(function(){
	$.ajax({
		"url":link+"tnewProductAjax",
		"type":"post",
		"data":{"i":"getCategories"},
		"dataType":"json",
		success:function(result){
			var add = "";
			console.log(result);
			for(var i=0; i<result.length;i++){
				categoryGroup = result[i];
				addPreend = '<select onChange="cat(this)" name="KategoriId">'; 
				addPreend = addPreend + "<option value='0'>Kategori Seçiniz</option>"
				for(var j=0; j<categoryGroup.length;j++){
					addPreend = addPreend + '<option value="'+categoryGroup[j].KategoriId+'">'+categoryGroup[j].KategoriAdi+'</option>';
				}
				addPreend = addPreend+ "</select> <br />";
				add = addPreend + add;
			}
			add = "KATEGORİLER : <br />" + add;
			$(".kategoriler").html(add);
		}
	});
});
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
function inputKontrol(){
	var kontrol = true;
	var type = $("input[name='TipAdi']").val();
	var selects = $("select");
	for(var i=0;i<selects.length;i++){
		if($("select:eq("+i+")").val() == 0){
			kontrol = false;
		}
	}
	if(type == ""){
		return false;
	}
	if(kontrol){
		$(".kaydetDiv").css({"background":"green","cursor":"pointer"});
	}
	else{
		$(".kaydetDiv").css({"background":"#ccc","cursor":"not-allowed"});
	}
	return kontrol;
}
function kaydet(){
	if(inputKontrol()){
		$(document).ready(function(){
			var data = $("form").serialize();
			$.ajax({
				"type":"POST",
				"url":link+"addNewProductType",
				"data":data,
				"success":function(result){
					$err = parseInt(result);
					if(result > 0){
						window.location = link+"admin/addFeatureToProductType/"+result+".html"
					}else{
						alert("Ürün tip eklenemedi");
					}
				}
			});
		});
	}
	else{
		alert("Lütfen tüm alanları doldurun");
	}
}