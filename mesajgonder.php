<?php
include 'info/config.php';
session_start();
$kadi=$_POST["kadi"];

$mesaj=$_POST["mesaj"];
date_default_timezone_set('Etc/GMT-3');
$tr=date("H:i:s");
if (strlen($mesaj)>0) {
$sql=$db->prepare("INSERT INTO mesajlar VALUES(NULL,?,?,?,?);");
$sql->execute(array($tr,$mesaj,$_SESSION["user"]["username"],$_SESSION["user"]["username"],));
$sql=$db->prepare("INSERT INTO mesajlar VALUES(NULL,?,?,?,?);");
$sql->execute(array($tr,$mesaj,$kadi,$_SESSION["user"]["username"],));
}
 ?>
