<?php
include  "header.php";
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
                            <h2>Kitap Bilgisi Güncelle</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form name="form1" action="" method="post" class="col-lg-4" enctype="multipart/form-data">
                                <table class="table table-bordered">

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Kitap Adı" name="kitap_ad"  />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Yazar Adı" name="yazar_ad"  />
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Yayınevi Adı" name="yayinevi_ad" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder="ISBN" name="isbn"  />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Yayın Tarihi/yil-ay-gün" name="yayin_yil"   />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Admin Kullanıcı Adı:
                                        </td>
                                        <td>
                                            <select name='admin_kadi'>
                                                <?php
                                                $s = mysqli_query($baglan,"select * from admin ")or die("Error: ".mysqli_error($baglan));
                                                while ($ls = mysqli_fetch_array($s)) {
                                                    ?>
                                                    <option value="<?=$ls["id"];?>"><?=$ls["a_kadi"];?></option>

                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>

                                    <td>Kategori: </td>
                                    <td>
                                        <select name='kategori'>
                                            <?php
                                            $s = mysqli_query($baglan,"select * from kategoriler ")or die("Error: ".mysqli_error($baglan));
                                            while ($ls = mysqli_fetch_array($s)) {
                                                ?>
                                                <option value="<?=$ls["k_id"];?>"><?=$ls["kategori_ad"];?></option>

                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <tr><td> <input type="file" name="image"> </td>
                                        <td>
                                            <div>
                                                     <textarea
                                                         id="text"
                                                         cols="40"
                                                         rows="1"
                                                         name="image_text"
                                                     ></textarea>
                                            </div></td></tr>
                                </table>


                                <tr>
                                    <td>

                                        <input class="btn btn-default submit" type="submit" name="guncelle" value="Guncelle">
                                    </td>
                                </tr>

                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
<?php

if(isset($_POST['guncelle'])) {
    $id=$_GET['id'];
    $kitap_ad = $_POST['kitap_ad'];
    $yazar_ad = $_POST['yazar_ad'];
    $yayinevi_ad = $_POST['yayinevi_ad'];
    $isbn = $_POST['isbn'];
    $yayin_yil = $_POST['yayin_yil'];
    $kategori_id = $_POST['kategori'];
    $image = $_FILES['image']['name'];
    // Get text
    $image_text = mysqli_real_escape_string($baglan, $_POST['image_text']);
    $admin_kadi='$_SESSION[a_kadi]';
    // image file directory
    $target = "images/".basename($image);

    if($kitap_ad){
        $guncelkayit = "UPDATE kitaplar SET kitap_ad = '$kitap_ad'  WHERE id='$id'";
        $sorgu = mysqli_query($baglan, $guncelkayit) or die("Error: " . mysqli_error($baglan));
    }
    elseif ($yazar_ad){

        $guncelkayit = "UPDATE kitaplar SET yazar_ad = '$yazar_ad'  WHERE id='$id'";
        $sorgu = mysqli_query($baglan, $guncelkayit) or die("Error: " . mysqli_error($baglan));
    }
    elseif ($kategori_id){

        $guncelkayit = "UPDATE kitaplar SET kategori_id= '$kategori_id'  WHERE id='$id'";
        $sorgu = mysqli_query($baglan, $guncelkayit) or die("Error: " . mysqli_error($baglan));
    }
    elseif ($yayinevi_ad){

        $guncelkayit = "UPDATE kitaplar SET yayinevi_ad= '$yayinevi_ad'  WHERE id='$id'";
        $sorgu = mysqli_query($baglan, $guncelkayit) or die("Error: " . mysqli_error($baglan));
    }
    elseif ($isbn){

        $guncelkayit = "UPDATE kitaplar SET yayinevi_ad= '$isbn'  WHERE id='$id'";
        $sorgu = mysqli_query($baglan, $guncelkayit) or die("Error: " . mysqli_error($baglan));
    }
    elseif ($yayin_yil){

        $guncelkayit = "UPDATE kitaplar SET yayin_yil= '$yayin_yil'  WHERE id='$id'";
        $sorgu = mysqli_query($baglan, $guncelkayit) or die("Error: " . mysqli_error($baglan));
    }
    elseif ($admin_kadi){

        $guncelkayit = "UPDATE kitaplar SET admin_kadi= '$admin_kadi'  WHERE id='$id'";
        $sorgu = mysqli_query($baglan, $guncelkayit) or die("Error: " . mysqli_error($baglan));
    }
    elseif ($image){

        $guncelkayit = "UPDATE kitaplar SET image= '$image'  WHERE id='$id'";
        $sorgu = mysqli_query($baglan, $guncelkayit) or die("Error: " . mysqli_error($baglan));
    }
    elseif ($image_text){

        $guncelkayit = "UPDATE kitaplar SET image_text= '$image_text'  WHERE id='$id'";
        $sorgu = mysqli_query($baglan, $guncelkayit) or die("Error: " . mysqli_error($baglan));
    }



}

?>

<?php

include "footer.php";
?>