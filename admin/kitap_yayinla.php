<?php

include "header.php";
include "baglan.php";
?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
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
                            <h2>Kitap Yayınla</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form name="form1" action="" method="post">
                                <table>
                                    <tr>
                                        <td>
                                            <select name="kullanici" class="form-control selectpicker">
                                                <?php
                                                $sorgu=mysqli_query($baglan,"select kadi from uyeler ");
                                                while ($sutun=mysqli_fetch_array($sorgu)){
                                                    echo "<option>";
                                                    echo $sutun["kadi"];
                                                    echo "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="submit" value="Ara" name="submit1"
                                                   class="form-control btn btn-default" style="margin-top: 5px">


                                        </td>
                                    </tr>

                                </table>

                                <?php
                                if(isset($_POST["submit1"])){
                                $sorgu1=mysqli_query($baglan, "Select * from uyeler where kadi='$_POST[kullanici]'");
                                while ($sutun1=mysqli_fetch_array($sorgu1)){
                                    $ad=$sutun1['ad'];
                                    $kadi=$sutun1['kadi'];
                                    $_SESSION['kadi']=$kadi;


                                }
                                ?>

                                <table class="table table-bordered">

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Üye Kullanıcı Adı" name="kadi" value="<?php echo "$kadi"; ?>"   disabled />
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Kitap Veriliş Tarihi" name="kitap_verilis_tarihi" value="<?php echo date('d-m-Y'); ?>" disabled />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <select name="kitapadi" class="form-control selectpicker">
                                                <?php
                                                $sorgu=mysqli_query($baglan, "select kitap_ad from kitaplar");
                                                while($sutun=mysqli_fetch_array($sorgu)){
                                                    echo "<option>";
                                                    echo  $sutun["kitap_ad"];
                                                    echo "</option>";
                                                }

                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" value="Kitap Yayınla"  name="submit2" class="form-control btn btn-default" style="background-color: palevioletred; color: whitesmoke"  />
                                        </td>
                                    </tr>


                                    <?php
                                    }
                                    ?>

                            </form>

                            <?php
                            if($_POST['submit2']) {
                                $kitap_verilis_tarihi=$_POST["kitap_verilis_tarihi"];


                                $e ="INSERT INTO kitap_yayinla VALUES (NULL, ' $_SESSION[kadi]',  '$_POST[kitapadi]','".$kitap_verilis_tarihi."')";
                            $a = mysqli_query($baglan,$e);


                            }
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