$(document).ready(function(){
	$(".kaydetDiv").attr("disabled","disabled");
});

function inputKontrol(){
	var kontrol = true;
	var ad = $("input[name='OzellikAdi']").val();
	var cins = $("input[name='OzellikCins']").val();
	if(ad == "" | cins == ""){
		kontrol = false;
	}
	console.log("dasda");
	if(kontrol){
		$(".kaydetDiv").removeAttr("disabled");
		$(".kaydetDiv").css({"background":"green","cursor":"pointer"});
	}
	else{
		$(".kaydetDiv").attr("disabled","disabled");
		$(".kaydetDiv").css({"background":"#ccc","cursor":"not-allowed"});
	}
	return kontrol;
}
inputKontrol();