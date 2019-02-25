<?php
include "baglan.php";
$id=$_GET["id"];
mysqli_query($baglan,"update uyeler set durum='yes' where id=$id");


header("refresh:1;url=uye_bilgileri.php");
?>