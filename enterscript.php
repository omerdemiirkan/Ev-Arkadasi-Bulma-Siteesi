<?php
$kadi=$_POST["kadi"];
?>

<script type="text/javascript">
$('#chatinput').keypress(function (e) {
var key = e.which;
if(key == 13)
{
mesaj=$("#chatinput").val();
$("#chatinput").val("");
$.post("mesajgonder.php",{mesaj:mesaj,kadi:"<?php echo $kadi; ?>"},function(data,status){
  $("#loaderbox").html(data);
});
}
});
</script>
