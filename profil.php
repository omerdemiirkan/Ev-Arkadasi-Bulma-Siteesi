<?php include 'header.php';
$kadi=$_GET["kadi"];
$sql=$db->prepare("SELECT * FROM accounts WHERE username=?");
$sql->execute([$kadi]);
$uye=$sql->fetch();

 ?>
<div class="container">
  <div class="row rounded bg-light" style="border:1px solid #eaeaea">
    <div class="col-12 p-2">
      <h2><?php echo $kadi; ?> Profili</h2>
      <hr>
    </div>
    <div class="col-2">
    </div>
    <div class="col-8">
      <table class="table">
        <tr>
          <th colspan="2" class="text-center">Profil Bilgileri</th>
        </tr>
        <tr>
          <th>Kullanıcı adı:</th>
          <td><?php echo $kadi; ?></td>
        </tr>
        <tr>
          <th>E-posta adresi:</th>
          <td><?php echo $uye["email"]; ?></td>
        </tr>
        <tr>
          <th>Telefon Numarası:</th>
          <td><?php echo $uye["number"]; ?></td>
        </tr>
        <tr>
          <th>Oluşturma tarihi:</th>
          <td><?php echo $uye["registerdate"]; ?></td>
        </tr>
        <tr>
          <th>Mesaj Gönder:</th>
          <td><a class="btn btn-warning kisi" kisi="<?php echo $kadi; ?>">Mesaj Gönder</a> </td>
        </tr>
      </table>
    </div>
  </div>

  <div class="row mt-2">
    <div class=" m-0 mt-5 col-12 rounded bg-white " style="border:1px solid #eaeaea;font-size:2.7vh">
      Kullanıcının ilanları
    <div class="col-12  row">
      <?php $sql=$db->prepare("SELECT * FROM `ilanlar` WHERE addusername=? ORDER BY id DESC");
      $sql->execute([$kadi]);
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
