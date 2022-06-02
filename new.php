<?php include 'header.php'; ?>
    <!-- Nav Bar End -->

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Ana Sayfa</a></li>
                    <li class="breadcrumb-item active">Yeni İlan Oluştur</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="contact-form">
                            <form method="POST" action="" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" placeholder="İlan İsmi" maxlength="50" name="isim"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Şehir"  name="sehir" />
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <input type="text" class="form-control" placeholder="İlçe"  name="ilce" />
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <input type="text" class="form-control" placeholder="Ev Oda Sayısı"  name="oda" />
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <input type="text" class="form-control" placeholder="Satış Tipi (Kira - Satış)"   name="tipi"/>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <input type="text" class="form-control" placeholder="Ev Tipi (Apartman vb.)"  name="atipi" />
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <input type="text" class="form-control" placeholder="Ev Eşyası (Var - Yok)" name="esya" />
                                    </div>
                                    <div class="form-group  col-md-12">
                                        <input type="number" class="form-control" placeholder="Evin Fiyatı (Ev kira ise kira fiyatı)"   name="fiyat"/>
                                    </div>
                                    <div class="form-group  col-md-12">
                                        <label for="">Evin Resmi</label>
                                        <input type="file" class="form-control" placeholder="Evin Resimleri"  name="belge" accept="image/*"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" rows="5" placeholder="İlan hakkında eklemek istedikleriniz. En az 50 karakter."  name="mess" minlength="50" maxlength="200"></textarea>
                                </div>
                                <div><button class="btn" type="submit">İlan Ver</button></div>
                            </form>
                            <?php

                                if ($_POST) {

                                    $isim = $_POST['isim'];
                                    $sehir = $_POST['sehir'];
                                    $ilce = $_POST['ilce'];
                                    $oda = $_POST['oda'];
                                    $tipi = $_POST['tipi'];
                                    $atipi = $_POST['atipi'];
                                    $esya = $_POST['esya'];
                                    $fiyat = $_POST['fiyat'];
                                    $message = $_POST['mess'];

                                    $tmpFile = $_FILES['belge']['tmp_name'];

                                    $newFile = './'.$_FILES['belge']['name'];

                                    $fileName = $_FILES['belge']['name'];
                                    $result = move_uploaded_file($tmpFile, $newFile);

                                    $ekle = $db->prepare("INSERT INTO ilanlar SET
                             addusername = ?,
                             email = ?,
                             serial = ?,
                             ilan_isim = ?,
                             ilan_sehir = ?,
                             ilan_fiyat = ?,
                             ilan_oda = ?,
                             ilan_tip = ?,
                             ilan_atip = ?,
                             ilan_kira = ?,
                             ilan_esya = ?,
                             ilan_resim = ?,
                             ilan_mes = ?,
                             ilan_bölge = ?");
                                    $ekle->execute([$_SESSION['user']['username'],$_SESSION['user']['email'],$_SESSION['user']['serial'],$isim,$sehir,$fiyat,$oda,$tipi,$atipi,$fiyat,$esya,$fileName,$message,$ilce]);

                                    if ($ekle) {
                                       echo  '<script>alert("İlan eklendi")</script>' ;
                                       echo '<meta http-equiv="refresh" content="0; url=index.php">';
                                    }



                                }



                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Contact End -->



        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
