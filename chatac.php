<?php
$kadi=$_POST["kisi"];
 ?>
<script type="text/javascript">
setInterval(function(){

  $.post("chatload.php",{kadi:"<?php echo $kadi; ?>"},function(data,status){
    $("#chat").html(data);
  });

 }, 500);
</script>
