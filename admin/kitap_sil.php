<?php
include "baglan.php";
$id=$_GET['id'];

mysqli_query($baglan,"delete from kitaplar where id=$_GET[id]");
header("Refresh:0; url=kitap_goruntule.php");
?>
