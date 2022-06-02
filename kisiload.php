<?php
include 'info/config.php';
session_start();
?>
<script type="text/javascript">
$(".kisi").click(function(){
  $("#chats").show();
  kisi=$(this).attr("kisi");
  $.post("chatac.php",{kisi:kisi},function(data,status){
    $("#loaderbox").html(data);
  });

  $.post("enterscript.php",{kadi:kisi},function(data,status){
    $("#enterscript").html(data);
    $("#kisiler").hide();
    $(".geri").show();
    $("#chat").show();
    $("#chatinput").show();
  });
});
</script>
<?php
$isims=[];
$sql=$db->prepare("SELECT DISTINCT kimden FROM mesajlar WHERE kimin=?");
$sql->execute([$_SESSION["user"]["username"]]);
while($mesaj=$sql->fetch()){
  if (!in_array($mesaj["kimden"],$isims) && $mesaj["kimden"]!=$_SESSION["user"]["username"]) {
    array_push($isims,$mesaj["kimden"]);
  }
} foreach ($isims as $isim):?>
<a kisi="<?php echo $isim; ?>" class="kisi">
<div class="w-100 py-3 m-0 bg-light" style="cursor:pointer;border-top:1px solid #eaeaea;border-bottom:1px solid #eaeaea">
  <?php echo $isim; ?>
</div>
</a>
<?php endforeach; ?>
