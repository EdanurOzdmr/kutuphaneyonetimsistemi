<?php
include "baglan.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> KOS </title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-book"></i> <span>KOS</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/indir.png" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Hoşgeldiniz,</span>

                        <h2> <?php $sql="Select a_ad, a_soyad from admin where a_kadi='$_SESSION[a_kadi]'";
                            $sorgu=mysqli_query($baglan, $sql);
                            while ($sutun=mysqli_fetch_array($sorgu)) {
                                $a_ad=$sutun["a_ad"];
                                $a_soyad=$sutun["a_soyad"];
                            }
                            echo "$a_ad $a_soyad";


                            ?>
                        </h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3></h3>
                        <ul class="nav side-menu">
                            <li><a href="uye_bilgileri.php"><i class="fa fa-home"></i> Üye Bilgileri <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="kitap_ekle.php"><i class="fa fa-edit"></i> Kitap Ekle <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="kitap_goruntule.php"><i class="fa fa-table"></i> Kitap Görüntüle <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="kitap_yayinla.php"><i class="fa fa-edit"></i> Kitap Yayınla <span class="fa fa-chevron-down"></span></a>

                            </li>


                        </ul>
                    </div>


                </div>

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="images/indir.png" alt="">
                                <?php $sql="Select a_ad, a_soyad from admin where a_kadi='$_SESSION[a_kadi]'";
                                $sorgu=mysqli_query($baglan, $sql);
                                while ($sutun=mysqli_fetch_array($sorgu)) {
                                    $a_ad=$sutun["a_ad"];
                                    $a_soyad=$sutun["a_soyad"];
                                }
                                echo "$a_ad $a_soyad";


                                ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="cikis.php"><i class="fa fa-sign-out pull-right"></i> Çıkış Yap</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">

                            </a>

                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->