<?php
ob_start();
session_start();
include_once "baglan.php";
?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Öğrenci Giriş Formu | KOS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Kütüphane Otomasyon Sistemi</h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h1>Öğrenci Giriş Formu</h1>

            <div>
                <input type="text" name="kadi" class="form-control" placeholder="Kullanıcı Adı" required=""/>
            </div>
            <div>
                <input type="password" name="parola" class="form-control" placeholder="Parola" required=""/>
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="giris" value="Giris">
                <a class="reset_pass" href="#">Şifrenizi unuttunuz mu?</a>
            </div>

            <div class="clearfix"></div>

        </form>
    </section>


</div>

<?php
if(isset($_POST["giris"])) {
    $kadi=$_POST["kadi"];
    $parola=$_POST["parola"];

    $sayac=0;
    $sorgu=mysqli_query($baglan, "select * from uyeler where kadi='".$kadi."' && parola='".$parola."' && durum='yes'");
    $sayac=mysqli_num_rows($sorgu);
    if($sayac==0){
        ?>
        <div class="alert alert-danger col-lg-6 col-lg-push-3">
            <strong style="color:white">Geçersiz</strong> Kullanıcı Adı ya da Parola.
        </div>
        <?php
    }
    else{
        $_SESSION["kadi"] = $kadi;
        echo "Giriş Doğrulandı.Yönlendiriliyorsunuz...";
        header("refresh:1;url=kitaplarim.php");


    }

}
?>

</body>
</html>
