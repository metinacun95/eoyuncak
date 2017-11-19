$(document).ready(function(){
	$.ajax({
		"url":link+"newProductAjax",
		"type":"post",
		"data":{"i":"getCategories"},
		"dataType":"json",
		success:function(result){
			var append = '<select name="ana" id="" onChange="cat(this)">';
			append = append + '<option value="0">Kategori Seçiniz</option>';
			for(var i=0;i<result.length;i++){
				append = append + '<option value="'+result[i]["KategoriId"]+'">'+result[i]["KategoriAdi"]+'</option>';
			}
			var append = append + '</select> <br />';
			$(".kategoriler").html(append);
		}
	});
});
function cat(obj){
	var obj = $(obj);
	var ex = obj.attr("name").split("-");
	var sub = ex[1];
	var catId = obj.val();
	$("select[name='cat-"+sub+"']").remove();
	$.ajax({
		"url":link+"newProductAjax",
		"type":"post",
		"data":{"i":"getCategories","sub":catId},
		"dataType":"json",
		success:function(result){
			var append = '<select name="cat-'+sub+'" id="" onSelect="cat(this)">';
			append = append + '<option value="0">Kategori Seçiniz</option>';
			for(var i=0;i<result.length;i++){
				append = append + '<option value="'+result[i]["KategoriId"]+'">'+result[i]["KategoriAdi"]+'</option>';
			}
			var append = append + '</select> <br />';
			$(".kategoriler").append(append);
		}
	});
}