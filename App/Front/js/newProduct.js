$(document).ready(function(){
	$.ajax({
		"url":link+"tnewProductAjax",
		"type":"post",
		"data":{"i":"getCategories"},
		"dataType":"json",
		success:function(result){
			var add = "";
			for(var i=0; i<result.length;i++){
				categoryGroup = result[i];
				addPreend = '<select onChange="cat(this)">'; 
				addPreend = addPreend + "<option value='0'>Kategori Seçiniz</option>"
				for(var j=0; j<categoryGroup.length;j++){
					addPreend = addPreend + '<option value="'+categoryGroup[j].KategoriId+'">'+categoryGroup[j].KategoriAdi+'</option>';
				}
				addPreend = addPreend+ "</select>";
				add = addPreend + add;
			}
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
						addAppend = '<select onChange="cat(this)">'; 
						addAppend = addAppend + '<option value="0">Seçiniz</option>';
						$.each(categoryGroup,function(key,value){
							if(key != "selected"){
								addAppend = addAppend + '<option value="'+value.KategoriId+'">'+value.KategoriAdi+'</option>';
							}
							else{
								
							}
						});
						addAppend = addAppend+ "</select>";
						add = add + addAppend;
					}
					$(".kategoriler").html(add);
					saveSelecteds(result);
				}
			}
			else if(typeof(result["productTypes"]) != "undefined"){
				var productTypes = result["productTypes"];
				var add = '<select onChange="selectType(this)">';
				add = add + '<option value="0">Seçiniz</option>'
				for(var i=0; i<productTypes.length;i++){
					add = add + '<option value="'+productTypes[i]["UrunTipId"]+'">'+productTypes[i]["UrunTipAdi"]+'</option>';
				}
				add = add + "</select>";
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
		"data":{"i":"getDetails","productTypeId":obj.val()},
		"dataType":"json",
		"success":function(result){
			console.log(result);
		}
	});
}