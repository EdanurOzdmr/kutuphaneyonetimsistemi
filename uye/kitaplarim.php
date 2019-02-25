<?php

include "header.php";
include "baglan.php";
?>

    <!-- page content area main -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">

                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row" style="min-height:500px">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Aldığım Kitaplar</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <?php

                        $sorgu=mysqli_query($baglan,"SELECT *  FROM kitap_yayinla LEFT JOIN uyeler ON kitap_yayinla.uye_kadi = uyeler.kadi");

                        echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                    echo "<th>"; echo "Kullanıcı Adı"; echo "</th>";
                                    echo "<th>"; echo "Kitap Adı"; echo "</th>";
                                    echo "<th>"; echo "Kitap Yayınlama Tarihi"; echo "</th>";

                                    echo "</tr>";

                                while ($sutun=mysqli_fetch_array($sorgu)) {

                                    $uye_kadi = $sutun["uye_kadi"];
                                    $kitap_ad = $sutun["kitap_ad"];
                                    $kitap_verilis_tarihi = $sutun["kitap_verilis_tarihi"];

                                    echo "<tr>";
                                    echo "<td>";
                                    echo $uye_kadi;
                                    echo "</td>";
                                    echo "<td>";
                                    echo $kitap_ad;
                                    echo "</td>";
                                    echo "<td>";
                                    echo $kitap_verilis_tarihi;
                                    echo "</td>";
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