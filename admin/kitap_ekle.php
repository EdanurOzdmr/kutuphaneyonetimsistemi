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
                            <h2>Kitap Bilgisi Ekle</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form name="form1" action="" method="post" class="col-lg-4" enctype="multipart/form-data">
                                <table class="table table-bordered">

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Kitap Adı" name="kitap_ad"  required="" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Yazar Adı" name="yazar_ad"  required="" />
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Yayınevi Adı" name="yayinevi_ad"  required=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder="ISBN" name="isbn"  required=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Yayın Tarihi/yil-ay-gün" name="yayin_yil"  required="" />
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

                                        <input class="btn btn-default submit" type="submit" name="ekle" value="Ekle">
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

if(isset($_POST['ekle'])) {
    $kitap_ad = $_POST['kitap_ad'];
    $yazar_ad = $_POST['yazar_ad'];
    $yayinevi_ad = $_POST['yayinevi_ad'];
    $isbn = $_POST['isbn'];
    $yayin_yil = $_POST['yayin_yil'];
    $kategori_id = $_POST['kategori'];
    $image = $_FILES['image']['name'];
    // Get text
    $image_text = mysqli_real_escape_string($baglan, $_POST['image_text']);

    // image file directory
    $target = "images/".basename($image);


    $yenikayit = "INSERT INTO kitaplar values (NULL,'" . $kitap_ad . "','" . $yazar_ad . "',' ".$kategori_id. "' , '" . $yayinevi_ad . "','" . $isbn . "','" . $yayin_yil . "','$_SESSION[a_kadi]', '".$image."', '".$image_text."')";

    $sorgu = mysqli_query($baglan, $yenikayit) or die("Error: " . mysqli_error($baglan));


    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }


}

?>

<?php

include "footer.php";
?>