<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yönetim Paneli</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo $link; ?>admin_assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo $link; ?>admin_assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <span style="font-size:52px;font-family:Monotype Corsiva;font-weight:bold;">Yönetim Paneli</span>
            </div>
        </div>
         <div class="row ">
               
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                <div class="panel-body">
                    <form action="" method="post" role="form">
                        <hr />
                        <h4>Kullanıcı Adı ve Parolanızı giriniz !</h4>
                        <br />
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                            <input type="text" name="username" class="form-control" pattern="[a-zA-Z0-9]{4,16}" title="Hatalı Deneme !" placeholder="Kullanıcı Adınız " required />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" name="password" class="form-control" pattern=".{6,12}" title="Hatalı Deneme !"  placeholder="Parolanız" required />
                        </div>
                                     
                        <input type="submit" class="btn btn-primary" value="Giriş Yap"/>
                        <hr />
                    </form>
                </div>
                           
            </div>
                
                
        </div>
    </div>

</body>
</html>
