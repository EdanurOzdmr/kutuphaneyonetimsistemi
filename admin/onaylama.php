<?php
include "baglan.php";
$id=$_GET["id"];
mysqli_query($baglan,"update uyeler set durum= 'no' where id=$id");
header("Refresh:1; url=uye_bilgileri.php");
?>


