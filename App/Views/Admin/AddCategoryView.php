<script type="text/javascript">
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
					addPreend = '<select onChange="cat(this)" name="KategoriId[]">'; 
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
		$("input[type='file']").on("change", function (e) {
			var file = $(this)[0].files[0];
			var upload = new Upload(file);

			// maby check size or type here with upload.getSize() and upload.getType()

			// execute upload
			upload.doUpload();
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
						addAppend = '<select onChange="cat(this)" name="KategoriId[]">'; 
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
</script>
<div id="page-wrapper">
			<div id="page-inner">
                <!-- #################################################### -->
				<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Ürün Ekle</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-6" style="width:100%;">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Ürün Resim Ekleme
                        </div>
							<form action="" method="post">
							<div class="panel-body">
								<div class="kategoriler">
									
								</div>
								Yeni Kategori Adı : <input type="text" name="yeniKategori" />
								<input type="submit" value="Kaydet" />
							</div>
							</form>
                                
                    </div>
                    <!--  end  Context Classes  -->
                </div>
            </div>
                <!-- /. ROW  -->
					   
				<!-- #################################################### -->	
			</div>
			<!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->