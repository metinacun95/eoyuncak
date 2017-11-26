$(document).ready(function(){
	$(".signup-form input[name='KullaniciAdi']").change(function(){
		$.ajax({
			"url":link+"ajax",
			"type":"post",
			"data":{"username":$(".signup-form input[name='KullaniciAdi']").val()},
			success:function(result){
				alert(result);
			}
		});
	});
});