<?php include 'header.php';
$id=$_GET["id"];
$sql=$db->prepare("SELECT * FROM ilanlar WHERE id=?");
$sql->execute([$id]);
$ilan=$sql->fetch();

$sql=$db->prepare("SELECT * FROM accounts WHERE username=?");
$sql->execute([$ilan["addusername"]]);
$sahip=$sql->fetch();
 ?>
<div class="container">
  <div class="row bg-light rounded" style="border:1px solid #eaeaea">
    <div class="col-12">
      <h2 class="p-2"><?php echo $ilan["ilan_isim"]; ?></h2>
    </div>
    <div class="col-md-7">
      <img src="<?php echo $ilan["ilan_resim"]; ?>" class="img-fluid" alt="İlan resmi">
    </div>
    <div class="col-md-5">
      <table class="table ">
        <tr>
          <th colspan="2" class="text-center" style="font-size:2vh">İlan Detayları</th>
        </tr>
        <tr>
          <th>İlan İsmi:</th>
          <td><?php echo $ilan["ilan_isim"]; ?></td>
        </tr>
        <tr>
          <th>Şehir:</th>
          <td><?php echo $ilan["ilan_sehir"]; ?></td>
        </tr>
        <tr>
          <th>Semt:</th>
          <td><?php echo $ilan["ilan_bölge"]; ?></td>
        </tr>
        <tr>
          <th>Oda Sayısı:</th>
          <td><?php echo $ilan["ilan_oda"]; ?></td>
        </tr>
        <tr>
          <th>Bina tipi:</th>
          <td><?php echo $ilan["ilan_atip"]; ?></td>
        </tr>
        <tr>
          <th>Eşya:</th>
          <td><?php echo $ilan["ilan_esya"]; ?></td>
        </tr>
        <tr>
          <th>İlan Sahibi:</th>
          <td><a href="profil.php?kadi=<?php echo $ilan["addusername"]; ?>"><?php echo $ilan["addusername"]; ?></a> </td>
        </tr>
        <tr>
          <th>İlan Telefon:</th>
          <td><?php echo $sahip["number"]; ?></td>
        </tr>
        <tr>
          <td class="text-center" style="font-size:2vh" colspan="2"><?php echo ($ilan["ilan_fiyat"]) ? "Fiyat" : "Kira" ; ?></td>
        </tr>
        <tr>
          <th class="text-center" style="font-size:2vh" colspan="2"><?php echo ($ilan["ilan_fiyat"]) ? $ilan["ilan_fiyat"] : $ilan["ilan_kira"] ; ?> TL</th>
        </tr>
      </table>
    </div>
  </div>
  <div class="row mt-2">
    <div class="p-1  m-0 col-12 rounded bg-dark text-white" style="border:1px solid #eaeaea;font-size:2.2vh">
      İlan detayı
    <div class="col-12 bg-light ">
      <p>
        <?php echo $ilan["ilan_mes"]; ?>
      </p>
    </div>
  </div>
  </div>

  <div class="row">
    <div class=" m-0 mt-5 col-12 rounded bg-white " style="border:1px solid #eaeaea;font-size:2.7vh">
      Son eklenen ilanlar
    <div class="col-12  row">
      <?php $sql=$db->prepare("SELECT * FROM `ilanlar` ORDER BY id DESC LIMIT 0,4");
      $sql->execute();
      while ($son=$sql->fetch()):?>
      <div class="col-3 bg-white rounded" style="border:1px solid #eaeaea">
        <div class="row">
          <div class="col-12">
            <a href="ilan.php?id=<?php echo $son["id"]; ?>">
              <img src="<?php echo $son["ilan_resim"]; ?>" class="img-fluid" alt="İlan Resmi">
            </a>
          </div>
          <div class="col-12 text-center p-2">
            <a href="ilan.php?id=<?php echo $son["id"]; ?>">
              <h4><?php echo $son["ilan_isim"]; ?></h4>
              <hr>
              <h5><?php echo ($son["ilan_fiyat"]) ? $son["ilan_fiyat"] : $son["ilan_kira"] ; ?> TL</h5>
            </a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
    </div>
  </div>
  </div>
</div>
<?php include 'footer.php'; ?>
