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
                    
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Üye Bilgileri</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                                $sorgu=mysqli_query($baglan, "select * from uyeler");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Ad"; echo "</th>";
                                echo "<th>"; echo "Soyad"; echo "</th>";
                                echo "<th>"; echo "Kullanıcı Adı"; echo "</th>";
                                echo "<th>"; echo "Parola"; echo "</th>";
                                echo "<th>"; echo "Eposta"; echo "</th>";
                                echo "<th>"; echo "Telefon"; echo "</th>";
                                echo "<th>"; echo "Durum"; echo "</th>";
                                echo "<th>"; echo "Onayla"; echo "</th>";
                                echo "<th>"; echo "Onaylama"; echo "</th>";

                      echo "</tr>";
                                while($sutun=mysqli_fetch_array($sorgu))
                                {
                                    echo "<tr>";
                                    echo "<td>"; echo $sutun["ad"]; echo "</td>";
                                    echo "<td>"; echo $sutun["soyad"]; echo "</td>";
                                    echo "<td>"; echo $sutun["kadi"]; echo "</td>";
                                    echo "<td>"; echo $sutun["parola"]; echo "</td>";
                                    echo "<td>"; echo $sutun["eposta"]; echo "</td>";
                                    echo "<td>"; echo $sutun["telefon"]; echo "</td>";
                                    echo "<td>"; echo $sutun["durum"]; echo "</td>";
                                    echo "<td>"; ?> <a href="onayla.php?id=<?php echo $sutun["id"]; ?>"> Onayla </a> <?php echo "</td>";
                                    echo "<td>"; ?> <a href="onaylama.php?id=<?php echo $sutun["id"]; ?>"> Onaylama </a> <?php echo "</td>";
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