<?php
include 'info/config.php';
$id=$_GET["id"];

$sql=$db->prepare("DELETE FROM ilanlar WHERE id=?");
$sql->execute([$id]);

 ?>
<script type="text/javascript">
  alert("İlan silinmiştir");
  window.location.href="profilim.php";
</script>
