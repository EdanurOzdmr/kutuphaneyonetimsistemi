<?php
include "baglan.php";
include "header.php";
?>
    <head>
        <title>Image Upload</title>
        <style type="text/css">


            img{
                float: left;
                margin: 5px;
                width: 130px;
                height: 140px;
                text-align: center;
            }
        </style>
    </head>

    <!-- page content area main -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3></h3>
                </div>

            </div>

            <div class="clearfix"></div>
            <div class="row" style="min-height:500px">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Kitaplar </h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form name="form1" action="" method="post" >
                                <input type="text" name="t1" class="form-control" placeholder="Kitap, Yazar veya Kategori Adı Giriniz">
                                <input type="submit" name="submit1" value="Kitap Ara" class="btn btn-default">
                            </form>

                            <?php

                            if(isset($_POST["submit1"])){
                                $sql="SELECT * FROM kitaplar LEFT JOIN kategoriler ON kitaplar.kategori_id = kategoriler.k_id where (kitap_ad  like ('$_POST[t1]%'))or (yazar_ad like ('$_POST[t1]%')) or (kategori_ad like ('$_POST[t1]%')) ";

                                $sorgu=mysqli_query($baglan, $sql)   or die("Error: " .mysqli_error($baglan));;

                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Kitap Adı"; echo "</th>";
                                echo "<th>"; echo "Yazar Adı"; echo "</th>";
                                echo "<th>"; echo "Yayınevi Adı"; echo "</th>";
                                echo "<th>"; echo "Yayın Yılı"; echo "</th>";
                                echo "<th>"; echo "ISBN"; echo "</th>";
                                echo "<th>"; echo "Kategori"; echo "</th>";
                                echo "<th>"; echo "Kitap Kapağı"; echo "</th>";
                                echo "<th>"; echo "Kitap Sil"; echo "</th>";
                                echo "<th>"; echo "Kitap Guncelle"; echo "</th>";
                                echo "</tr>";

                                while ($sutun=mysqli_fetch_array($sorgu)) {

                                    $s= "SELECT k_id, kategori_ad FROM kategoriler";


                                    $kitap_ad=$sutun["kitap_ad"];
                                    $yazar_ad=$sutun["yazar_ad"];
                                    $yayinevi_ad=$sutun["yayinevi_ad"];
                                    $kategori_ad=$sutun["kategori_ad"];
                                    $isbn=$sutun["isbn"];
                                    $yayin_yil=$sutun["yayin_yil"];
                                    $image=$sutun["image"];

                                    echo "<tr>";
                                    echo "<td>"; echo $kitap_ad; echo "</td>";
                                    echo "<td>"; echo $yazar_ad; echo "</td>";
                                    echo "<td>"; echo $yayinevi_ad; echo "</td>";
                                    echo "<td>"; echo $yayin_yil; echo "</td>";
                                    echo "<td>"; echo $isbn; echo "</td>";
                                    echo "<td>"; echo $kategori_ad; echo "</td>";
                                    echo "<td>";
                                    echo "<div id='img_div'>";
                                    echo "<img src='images/".$sutun['image']."' >";
                                    echo "</div>";
                                    echo "</td>";
                                    echo "<td>"; ?> <a href="kitap_sil.php?id=<?php echo $sutun["id"]; ?>"> Sil </a> <?php echo "</td>";
                                    echo "<td>"; ?> <a href="kitap_guncelle.php?id=<?php echo $sutun["id"]; ?>"> Güncelle </a> <?php echo "</td>";
                                    echo "</tr>";

                                }
                                echo "</table>";
                            }

                            $sql="SELECT * FROM kitaplar LEFT JOIN kategoriler ON kitaplar.kategori_id = kategoriler.k_id";
                            //$sql = "SELECT *,kategori_ad FROM kitaplar,kategoriler WHERE kitaplar.kategori_id = kategoriler.id";
                            $sorgu=mysqli_query($baglan, $sql)   or die("Error: " .mysqli_error($baglan));;

                            echo "<table class='table table-bordered'>";
                            echo "<tr>";
                            echo "<th>"; echo "Kitap Adı"; echo "</th>";
                            echo "<th>"; echo "Yazar Adı"; echo "</th>";
                            echo "<th>"; echo "Yayınevi Adı"; echo "</th>";
                            echo "<th>"; echo "Yayın Yılı"; echo "</th>";
                            echo "<th>"; echo "ISBN"; echo "</th>";
                            echo "<th>"; echo "Kategori"; echo "</th>";
                            echo "<th>"; echo "Kitap Kapağı"; echo "</th>";
                            echo "<th>"; echo "Kitap Sil"; echo "</th>";
                            echo "<th>"; echo "Kitap Guncelle"; echo "</th>";
                            echo "</tr>";

                            while ($sutun=mysqli_fetch_array($sorgu)) {


                                $kitap_ad=$sutun["kitap_ad"];
                                $yazar_ad=$sutun["yazar_ad"];
                                $yayinevi_ad=$sutun["yayinevi_ad"];
                                $kategori_ad=$sutun["kategori_ad"];
                                $isbn=$sutun["isbn"];
                                $yayin_yil=$sutun["yayin_yil"];
                                $image=$sutun["image"];

                                echo "<tr>";
                                echo "<td>"; echo $kitap_ad; echo "</td>";
                                echo "<td>"; echo $yazar_ad; echo "</td>";
                                echo "<td>"; echo $yayinevi_ad; echo "</td>";
                                echo "<td>"; echo $yayin_yil; echo "</td>";
                                echo "<td>"; echo $isbn; echo "</td>";
                                echo "<td>"; echo $kategori_ad; echo "</td>";
                                echo "<td>";
                                    echo "<div id='img_div'>";
                                    echo "<img src='images/".$sutun['image']."' >";
                                    echo "</div>";
                                 echo "</td>";
                                echo "<td>"; ?> <a href="kitap_sil.php?id=<?php echo $sutun["id"]; ?>"> Sil </a> <?php echo "</td>";
                                echo "<td>"; ?> <a href="kitap_guncelle.php?id=<?php echo $sutun["id"]; ?>"> Güncelle </a> <?php echo "</td>";
                                echo "</tr>";

                            }
                            echo "</table>";
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

<?php
include "footer.php";
?>