<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Girişi</title>
    <style> *{margin-bottom: 1rem;} </style>
</head>
<body>
    <a href="../">Ana Sayfa'ya Git</a>
    <form action="kontrol.php" method="post">
        <?php
            session_start();
            if(!isset($_SESSION["denemeHakki"])){
                $_SESSION["denemeHakki"] = 3;
            }

            if($_SESSION["denemeHakki"] > 1){
                echo '
                <label for="kullaniciadisoyadi">Admin Adı Soyadı: </label>
                <input type="text" name="kullaniciadisoyadi" id="kullaniciadisoyadi">
                <br>
                <label for="kullanicisifre">Admin Şifre: </label>
                <input type="password" name="kullanicisifre" id="kullanicisifre">
                <br>
                <input type="submit" name="girisyap" id="girisyap" value="Giriş Yap">
                <br>';
            }else if($_SESSION["denemeHakki"] <= 1){
                echo "<p>DENEME HAKKINIZ BİTTİ!</p>";
            }
        ?>
        
        <?php
            if(isset($_GET["hata"])){
                if($_GET["hata"] == 1){
                    echo "<p>Kullanıcı adı veya şifresi yanlış!</p>";
                    $_SESSION["denemeHakki"] = $_SESSION["denemeHakki"] - 1;
                    if($_SESSION["denemeHakki"] > 0 && $_SESSION["denemeHakki"] !== 3){
                        echo '<p>'.$_SESSION["denemeHakki"].' deneme hakkınız kaldı!</p>';
                    }
                }
            }
        ?>
    </form>
</body>
</html>