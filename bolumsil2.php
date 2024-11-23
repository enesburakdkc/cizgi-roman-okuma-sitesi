<?php
    session_start();
    if(!isset($_SESSION["kullaniciRol"])){
        header("location: admingirisi.php");
    }else if($_SESSION["kullaniciRol"] !== "admin"){
        header("location: admingirisi.php");
    }

    if(isset($_POST["mangaadi"])){
        $mangaAdi = null;
        $mangaAdi = $_POST["mangaadi"];
    }
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manga Sil</title>
    <style> *{margin-bottom: 1rem;} </style>
</head>
<body>
    <a href="../">Ana Sayfa'ya Git</a>
    <br>
    <a href="bolumsil1.php">Başka Manga Seç</a>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="mangabolumu">Bölüm Seçiniz: </label>
        <select name="mangabolumu" id="mangabolumu">
            <?php
                include("baglanti.php");

                $sqlkomut2 = "SELECT * FROM bolum WHERE adi = \"$mangaAdi\" ORDER BY bolumSayisi ASC";
                $islem2 = $baglanti->query($sqlkomut2);
        
                if($islem2->num_rows > 0){
                    while($bolum = $islem2->fetch_assoc()){
                        $bolumSayisi = $bolum["bolumSayisi"];
                        $bolumAdi = $bolum["bolumAdi"];
                    
                        echo "<option value = \"$bolumSayisi*$mangaAdi\">Bölüm: $bolumSayisi - $bolumAdi</option>";
                    }
                }
            ?>
        </select>
        <br>
        <label>Bu işlem geri alınamaz!</label>
        <br>
        <input type="submit" name="sil" id="sil" value="Sil">
    </form>
</body>
</html>

<?php
    if(isset($_POST["sil"])){
        
        //Manga adı tanımlama
        $mangabolumu = null;
        $mangabolumu = $_POST["mangabolumu"];
        $mangabolumu = explode("*", $mangabolumu);
        $bolumsayisi = $mangabolumu[0];
        $mangaadiUC = $mangabolumu[1];
        $mangaadiREPLACE = strtolower($mangaadiUC);
        $mangaadiREPLACE = str_replace(" ", "-",$mangaadiREPLACE);

        if($mangaadiREPLACE != ""){
            //Dosyayı silme              
            function klasoruSil($klasorYolu) {
                //Klasör içindeki dosyaları ve alt klasörleri sil
                $dosyalar = glob($klasorYolu . '/*');
                foreach ($dosyalar as $dosya) {
                    if(is_dir($dosya)){
                        klasoruSil($dosya);
                    }
                    else{
                        unlink($dosya);
                    }
                }
                //Klasörü sil
                rmdir($klasorYolu);
            }
                
            $klasorYolu = "mangalar/$mangaadiREPLACE/bolumler/$bolumsayisi";
                
            if(is_dir($klasorYolu)){
                klasoruSil($klasorYolu);
                echo "Klasör ve içeriği başarıyla silindi.<br>";
            }
            else{
                echo "Klasör bulunamadı ve bu sebeple klasör silinemedi!<br>";
            }

            //Mangayı database'den silme
            $sqlkomut3 = "DELETE FROM bolum WHERE adi = \"$mangaadiUC\" AND bolumSayisi = \"$bolumsayisi\"";
            if($baglanti->query($sqlkomut3) === true){
                echo "Manga database'den başarıyla silindi.<br>";
            }
            else{
                echo "Manga database'den silinemedi!<br>";
            }
        }
        else{
            echo "Eksik değer!";
        }
    }
?>