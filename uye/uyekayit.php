<?php
include "baglan.php";
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Üye Kayıt Formu </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Kütüphane Otomasyon Sistemi</h1>
</div>


<body class="login" style="margin-top: -20px;">



<div class="login_wrapper">

    <section class="login_content" style="margin-top: -40px;">
        <form action="" method="post">
            <h2>Kullanıcı Kayıt Formu</h2><br>

            <div>
                <input type="text" class="form-control" placeholder="Ad" name="ad" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="Soyad" name="soyad" required=""/>
            </div>

            <div>
                <input type="text" class="form-control" placeholder="Kullanıcı Adı" name="kadi" required=""/>
            </div>
            <div>
                <input type="password" class="form-control" placeholder="Parola" name="parola" required=""/>
            </div>
            <div>
                <input type="email" class="form-control" placeholder="Eposta" name="eposta" required=""/>
            </div>
            <div>
                <input type="tel" class="form-control" placeholder="Telefon Numarası" name="telefon" required=""/>
            </div>
            <div classs="col-lg-12  col-lg-push-3">
                <input class="btn btn-default submit " type="submit" name="submit1" value="Kayıt Ol">
            </div>

        </form>
    </section>

    <?php



    if(isset($_POST['submit1'])) {

        $ad=$_POST['ad'];
        $soyad=$_POST['soyad'];
        $kadi=$_POST['kadi'];
        $parola=$_POST['parola'];
        $eposta=$_POST['eposta'];
        $telefon=$_POST['telefon'];

        if($ad=="" or  $soyad=="" or $kadi=="" or $parola=="" or $eposta=="" or $telefon=="")
        {
            echo "Lütfen tüm alanları eksiksiz doldurun!</center>";
            header("Refresh: 2; url=ogrencikayit.php");
            return;
        }
        function checkmail($eposta){
            return filter_var($eposta, FILTER_VALIDATE_EMAIL);
        }

        if(!checkmail($eposta))
        {
            echo " Yazdığınız e-posta adresi geçersiz!";
            header("Refresh: 2; url=uyekayit.php");
            return;
        }
        $isim_kontrol = mysqli_query($baglan, "select * from uyeler where kadi='".$kadi."'") or die (mysqli_error());
        $uye_varmi = mysqli_num_rows($isim_kontrol);
        if($uye_varmi > 0)
        {
            echo " Kullanıcı adı başka bir üye tarafından kullanılıyor!";
            header("Refresh: 2; url=ouyekayit.php");
            return;
        }
        $eposta_kontrol = mysqli_query($baglan, "select * from uyeler where eposta='".$eposta."'") or die (mysqli_error());

        $eposta_varmi = mysqli_num_rows($eposta_kontrol);
        if($eposta_varmi > 0)
        {
            echo " E-Posta başka bir üye tarafından kullanılıyor!";
            header("Refresh: 2; url=uyekayit.php");
            return;
        }

        $yenikayit = "INSERT INTO uyeler values (NULL,'" . $ad . "','" . $soyad . "',' ".$kadi. "' , '" . $parola . "','" . $eposta . "','" . $telefon . "', 'no')";

        $sorgu = mysqli_query($baglan,$yenikayit)or die("Error: " . mysqli_error($baglan));



        echo " Kayıt işlemi tamamlandı, üyelik işleminiz onaylandıktan sonra giriş yapabilirsiniz.";

        header("refresh:2; url=giris.php");


    }

    ?>



</div>





</body>
</html>
