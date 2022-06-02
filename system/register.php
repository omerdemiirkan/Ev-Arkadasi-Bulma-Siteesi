<?php 

include '../info/config.php';



$name = $_POST['name'];
$surname = $_POST['surname'];
$username = $_POST['username'];
$pass = $_POST['pass'];
$rank = $_POST['rank'];
$id = rand(1000000,99999999999);



$ekle = $db->prepare("INSERT INTO accounts SET username = ?, name = ?, surname = ?, password = ?, rank = ?,number =?");
$ekle->execute([$username, $name, $surname, $pass, $rank,$id]);

if ($ekle) {
    if ($rank == "Instructor") {
        session_start();
        $user = $db->query("SELECT * FROM accounts WHERE username = '$username' AND password = '$pass'")->fetch();
        if ($user) {
            $_SESSION['user'] = $user;
            echo '<meta http-equiv="refresh" content="0; url=../instructermain.php">';
        }
        
    }
    if ($rank == "Student") {
        session_start();
        $user = $db->query("SELECT * FROM accounts WHERE username = '$username' AND password = '$pass'")->fetch();
        if ($user) {
            $_SESSION['user'] = $user;
            echo '<meta http-equiv="refresh" content="0; url=../studentmain.php">';
        }
        
    }
    if ($rank  == "Secretary") {
        session_start();
        $user = $db->query("SELECT * FROM accounts WHERE username = '$username' AND password = '$pass'")->fetch();
        if ($user) {
            $_SESSION['user'] = $user;
            echo '<meta http-equiv="refresh" content="0; url=../secretary.php">';
        }
        
    }
}else {
    echo "Hata! Beklenmeyen SQL hatası.";
    header("location:../mainpage.php?h=Kayıt anında bir hata oluştu!");

}

?>