<?php
include "baglan.php";
include "header.php";
?>

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


                            <?php

                            $sql="SELECT * FROM kitaplar LEFT JOIN kategoriler ON kitaplar.kategori_id = kategoriler.k_id";
                            $sorgu=mysqli_query($baglan, $sql)   or die("Error: " .mysqli_error($baglan));;

                            echo "<table class='table table-bordered'>";
                            echo "<tr>";
                            echo "<th>"; echo "Kitap Adı"; echo "</th>";
                            echo "<th>"; echo "Yazar Adı"; echo "</th>";
                            echo "<th>"; echo "Yayınevi Adı"; echo "</th>";
                            echo "<th>"; echo "Yayın Yılı"; echo "</th>";
                            echo "<th>"; echo "ISBN"; echo "</th>";
                            echo "<th>"; echo "Kategori"; echo "</th>";
                            echo "</tr>";

                            while ($sutun=mysqli_fetch_array($sorgu)) {

                                $kitap_ad=$sutun["kitap_ad"];
                                $yazar_ad=$sutun["yazar_ad"];
                                $yayinevi_ad=$sutun["yayinevi_ad"];
                                $kategori_ad=$sutun["kategori_ad"];
                                $isbn=$sutun["isbn"];
                                $yayin_yil=$sutun["yayin_yil"];

                                echo "<tr>";
                                echo "<td>"; echo $kitap_ad; echo "</td>";
                                echo "<td>"; echo $yazar_ad; echo "</td>";
                                echo "<td>"; echo $yayinevi_ad; echo "</td>";
                                echo "<td>"; echo $yayin_yil; echo "</td>";
                                echo "<td>"; echo $isbn; echo "</td>";
                                echo "<td>"; echo $kategori_ad; echo "</td>";
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