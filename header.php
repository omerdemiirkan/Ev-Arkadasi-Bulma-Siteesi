<!DOCTYPE html>
<html lang="en">
    <?php session_start();

    include 'info/config.php';

    if (isset($_SESSION['user'])) {
        # code...
    }else {
        echo '<meta http-equiv="refresh" content="0; url=login.php">';
        die("Giriş yapın!");

    }

    ?>
    <head>
        <meta charset="utf-8">
        <title>İlan Ver - Ev Arkadaşı Bulma Sitesi</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
        <meta content="Bootstrap News Template - Free HTML Templates" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <script type="text/javascript">
        $(document).ready(function(){
          setInterval(function(){
             $("#kisiler").load("kisiload.php");
           }, 500);

           $(".geri").click(function(){
             $("#kisiler").show();
             $("#chat").hide();
             $(".geri").hide();
             $("#chatinput").hide();
           });


          $(".altfiyat").click(function(){
            $("#altfiyat").val($(".altfiyat").val());
          });

          $(".ustfiyat").click(function(){
            $("#ustfiyat").val($(".ustfiyat").val());
          });

          $(".arama-dropdowner").click(function(){
            $("#arama-dropdown").toggle();
          });

          $('#aramainput').keypress(function (e) {
       var key = e.which;
       if(key == 13)
        {
          mesaj=$("#aramainput").val();
          window.location.href="arama.php?key="+mesaj;
        }
      });
      $("#chatopener").click(function(){
        $("#chats").show();
      });

      $("#chatkapa").click(function(){
        $("#chats").hide();
        $("#chatminimized").show();
      });
      $("#chatminimized").click(function(){
        $("#chats").show();
        $("#chatminimized").hide();
      });
        });
        </script>
    </head>

    <body>
<div id="enterscript">

</div>
      <div id="loaderbox">

      </div>

      <div class="text-center text-white py-2" style="background:#ff6f61;font-size:2vh;cursor:pointer;position:fixed;width:20%;left:70%;top:96%;z-index:998" id="chatminimized">
        <strong>Mesajlar</strong>
      </div>

      <div class="bg-white rounded " style="display:none;position:fixed;left:73%;width:26%;top: 33% ;height:67%;border:1px solid #eaeaea;z-index:998" id="chats">
        <a class="btn btn-warning geri m-2" style="display:none;position:absolute">< Geri  </a>
        <div class="text-center text-white py-3" style="background:#ff6f61;cursor:pointer" id="chatkapa">

          <strong style="font-size:2vh">Mesajlar</strong>
        </div>
        <div class="" id="chat" style="overflow:auto;height:70%;display:none">
          Yükleniyor...
        </div>
        <div class="" id="kisiler">

        </div>
        <div class="text-center pt-2 px-3 bg-light" style="width:19.9%;position:fixed;top:92%;z-index:999;border-top:1px solid #eaeaea;width:inherit;">

          <input type="text" name="asd" value="" class="form-control" id="chatinput" placeholder="Mesajınız..."  style="display:none">

        </div>
      </div>


        <!-- Brand Start -->
        <div class="brand">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-2">
                        <div class="b-logo">
                            <a href="index.php">
                                <img src="images/logo.png" class="img-fluid" alt="Logo" style="width: 100%; height: 100%;">

                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                      <input type="text" id="aramainput" placeholder="Arama yap" name="" value="" class="form-control">
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <a href="profilim.php" class="btn btn-primary">Profilim</a>
                      <a class="btn btn-warning chatopener">Mesajlar</a>
                      <a class="btn btn-danger" href="cikis.php">Çıkış Yap</a>
                    </div>


                </div>
            </div>
        </div>
        <!-- Brand End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">Menü</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.php" class="nav-item nav-link active">Ana Sayfa</a>

                            <a href="new.php" class="nav-item nav-link">İlan Ver</a>
                        </div>
                        <div class="social ml-auto ">

                              <h5><?php echo "Merhaba ".$_SESSION['user']['username']?></h5>

                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
