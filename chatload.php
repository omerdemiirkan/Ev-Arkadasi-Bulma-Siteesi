<?php include 'info/config.php';
session_start(); ?>
<?php $kadi=$_POST["kadi"]; ?>
 <div class="text-center my-3">

<?php echo $kadi; ?> Konuşmaya giriş yaptı.

 </div>

<?php

$sql=$db->prepare("SELECT * FROM mesajlar WHERE kimin=? LIMIT 0,50");
$sql->execute(array($_SESSION["user"]["username"]));
$msgs=$sql->fetchAll(PDO::FETCH_ASSOC);
foreach ($msgs as $msg ) {
  ?>

<div class="my-1 <?php echo ($msg["kimden"]==$_SESSION["user"]["username"]) ? "text-right" : "text-left" ; ?> px-2" >
<div class="p-2 rounded <?php echo ($msg["kimden"]==$_SESSION["user"]["username"]) ? "text-white" : "text-black" ; ?>"
   style="position:relative;display:inline-block;background:<?php echo ($msg["kimden"]==$_SESSION["user"]["username"]) ? "#2bb672" : "#eaeaea" ; ?>;">

  <?php echo $msg["mesaj"]; ?>

</div>
<br> <small style="color:gray"><?php echo $msg["tarih"]; ?></small>
</div>
  <?php
}
 ?>
