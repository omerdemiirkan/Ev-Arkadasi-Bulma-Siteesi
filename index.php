<?php include 'header.php'; ?>

        <!-- Category News Start-->
        <div class="cat-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <br>
                        <h2>Son Eklenen</h2>
                        <div class="row cn-slider">

                            <?php

                $query = $db -> query("SELECT * FROM ilanlar")->fetch();

                if ($query) {


                    $sorgu = $db -> prepare("SELECT * FROM `ilanlar` ORDER BY id DESC LIMIT 0,1");
                    $sorgu -> execute([]);




                    while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)): ?>

                            <div class="col-md-6">
                            <div class="cn-img">
                                <img src="<?php echo $cikti['ilan_resim']; ?>" />
                                <div class="cn-title">
                                <a href="ilan.php?id=<?php echo $cikti["id"]; ?>"><?php echo $cikti['ilan_isim']; ?> (<?php echo $cikti['ilan_fiyat']; ?> TL)</a>
                                </div>
                            </div>
                        </div>
                      <?php endwhile; ?>
                    <?php }else{ ?>

                  <center><h5>Hiç ilan yok, ilk ilanı sen ver!</h5></center>
                <?php } ?>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <br>
                        <br>
                        <h2>Son İlanın</h2>
                        <div class="row cn-slider">

                        <?php
                            $username = $_SESSION['user']['username'];
                            $query = $db -> query("SELECT * FROM ilanlar WHERE addusername = '$username'")->fetch();

                            if ($query) {
                                $db->exec("SET NAMES utf8");
                                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                $sorgu = $db -> prepare("SELECT * FROM `ilanlar` WHERE addusername = ? ORDER BY id DESC LIMIT 0,1");
                                $sorgu -> execute([$username]);




                                while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) { ?>

                                    <div class="col-md-6">
                                    <div class="cn-img">
                                        <img src="<?php echo $cikti['ilan_resim']; ?>" />
                                        <div class="cn-title">
                                            <a href="ilan.php?id=<?php echo $cikti["id"]; ?>"><?php echo $cikti['ilan_isim']; ?> (<?php echo $cikti['ilan_fiyat']; ?> TL)</a>
                                        </div>
                                    </div>
                                </div>
                                 <?php
                                }
                            }else {
                                echo '<center><h5>Hiç ilanın yok, ilk ilanını ver!</h5></center>';
                            }
                            ?>
                        </div>
                    </div>




        <!-- Main News Start-->
        <div class="main-news">
            <h1>İlanlar</h1>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">


                            <?php
                            $username = $_SESSION['user']['username'];
                            $query = $db -> query("SELECT * FROM ilanlar")->fetch();

                            if ($query) {
                                $db->exec("SET NAMES utf8");
                                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                $sorgu = $db -> prepare("SELECT * FROM `ilanlar`");
                                $sorgu -> execute([]);




                                while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                                    echo '
                                    <div class="col-md-4">
                                    <div class="cn-img">
                                    <img src="',$cikti['ilan_resim'],'" />
                                    <div class="cn-title">
                                        <a href="ilan.php?id=',$cikti["id"],'">',$cikti['ilan_isim'],' (',$cikti['ilan_fiyat'],' TL)</a>
                                    </div>
                                </div>
                                </div>
                                ';
                                }
                            }else {
                                echo '<center><h5>Hiç ilan yok, ilk ilanını ver!</h5></center>';
                            }
                            ?>

                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- Main News End-->

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
