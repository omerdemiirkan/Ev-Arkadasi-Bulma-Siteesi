<?php include 'header.php';
if(isset($_POST["detayliarama"])){
  $key=$_POST["key"];
  $sehir=$_POST["sehir"];
  $bolge=$_POST["bolge"];
  $esya=$_POST["esya"];
  $bina=$_POST["bina"];
  $odasayisi=$_POST["odasayisi"];
  $alt=$_POST["altfiyat"];
  $ust=$_POST["ustfiyat"];
  $sql=$db->prepare("SELECT * FROM ilanlar WHERE (ilan_isim LIKE ? or ilan_mes LIKE ? ) AND ilan_sehir LIKE ? AND ilan_bölge LIKE ? AND ilan_oda LIKE ? AND ilan_atip LIKE ? AND ilan_esya LIKE ? AND ilan_fiyat<?  AND ilan_fiyat>? ");
  $sql->execute(["%".$key."%","%".$key."%","%".$sehir."%","%".$bolge."%","%".$odasayisi."%","%".$bina."%","%".$esya."%",$ust,$alt]);
  $ilans=$sql->fetchAll(PDO::FETCH_ASSOC);
}else {
$key=$_GET["key"];
$sql=$db->prepare("SELECT * FROM ilanlar WHERE ilan_isim LIKE ? or ilan_mes LIKE ?");
$sql->execute(["%".$key."%","%".$key."%"]);
$ilans=$sql->fetchAll(PDO::FETCH_ASSOC);
}
 ?>
 <div class="main-news mt-2 ml-2">
     <h1><?php echo $key; ?> İlanları <br> <a class="btn btn-success arama-dropdowner" >Detaylı arama</a> </h1>
     <div class="container row rounded p-3" id="arama-dropdown" style="border:1px solid #eaeaea">
       <div class="col-12">
       <h3>Arama detaylandırma</h3>
     </div>
     <div class="col-4">
       <form class="" action="arama.php" method="post">
       <input  type="text" name="key" value="<?php echo $key; ?>" placeholder="Arama" class="form-control">
       <input  type="text" name="sehir" value="" placeholder="Şehir" class="form-control">
       <input  type="text" name="bolge" value="" placeholder="Bölge" class="form-control">
       <select class="form-control" name="odasayisi" >
         <option value="">Oda sayısı</option>
         <option value="3">3+1</option>
         <option value="2">2+1</option>
         <option value="1">1+1</option>
         <option value="0">0+1</option>
       </select>
       <select class="form-control" name="esya" >
         <option value="">Eşya</option>
         <option value="Var">Var</option>
         <option value="Yok">Yok</option>
       </select>
       <select class="form-control" name="bina" >
         <option value="">Bina tipi</option>
         <option value="Var">Apartman</option>
         <option value="Yok">Müstakil</option>
       </select>

       <input type="range" value="100" min="10" max="10000" step="10" class="w-50 altfiyat"> Alt fiyat: <input type="text" id="altfiyat" name="altfiyat" value="100" class="ml-2"> TL <br>
       <input type="range" value="1000" step="10" min="10" max="10000" class="w-50 ustfiyat"> Üst Fiyat: <input type="text" id="ustfiyat" name="ustfiyat" value="1000" class="ml-2"> TL <br>
       <input type="submit" name="detayliarama" value="Arama yap" class="btn btn-primary m-3">
     </form>
   </div>
     </div>
     <hr>
     <div class="container">
                 <div class="row">
                   <?php foreach($ilans as $ilan): ?>
                    <div class="col-4">
                     <div class="cn-img">
                     <img src="<?php echo $ilan["ilan_resim"]; ?>" class="img-fluid">
                     <div class="cn-title">
                         <a href="ilan.php?id=<?php echo $ilan["id"]; ?>"> <?php echo $ilan['ilan_isim']; ?> (<?php echo $ilan['ilan_fiyat']; ?> TL)</a>
                     </div>
                 </div>
                 </div>
               <?php endforeach; ?>
                 </div>
     </div>
 </div>
<?php include 'footer.php'; ?>
