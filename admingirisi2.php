<?php
    session_start();
    if(!isset($_SESSION["kullaniciAdiSoyadi"])){
        header("location: admingirisi.php");
    }
?>

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
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
        <label>Gitmek İstediğiniz Sayfayı Seçiniz:</label>
        <select name="mangaorbolum" id="mangaorbolum">
            <option value="mangaekle">Manga Ekle Sayfasına Git</option>
            <option value="bolumekle">Bölüm Ekle Sayfasına Git</option>
            <option value="mangaduzenle">Manga Düzenle Sayfasına Git</option>
            <?php
                if($_SESSION["kullaniciRol"] == "admin"){
                    echo "
                    <option value=\"bolumsil\">Bölüm Sil Sayfasına Git</option>
                    <option value=\"mangasil\">Manga Sil Sayfasına Git</option>";
                }
            ?>

        </select>
        <br>
        <input type="submit" name="girisyap" id="girisyap" value="Devam Et">
    </form>
</body>
</html>

<?php
    if(isset($_POST["mangaorbolum"])){
        if($_POST["mangaorbolum"] == "mangaekle"){
            header("location: mangaekle.php");
        }
        else if($_POST["mangaorbolum"] == "bolumekle"){
            header("location: bolumekle.php");
        }
        else if($_POST["mangaorbolum"] == "mangaduzenle"){
            header("location: mangaduzenle1.php");
        }
        else if($_POST["mangaorbolum"] == "bolumsil"){
            header("location: bolumsil1.php");
        }
        else if($_POST["mangaorbolum"] == "mangasil"){
            header("location: mangasil.php");
        }
    }
?>