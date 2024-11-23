<?php
    session_start();
    if(!isset($_SESSION["kullaniciRol"])){
        header("location: admingirisi.php");
    }else if($_SESSION["kullaniciRol"] !== "admin"){
        header("location: admingirisi.php");
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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <label for="mangaadi">Manga Seçiniz: </label>
        <select name="mangaadi" id="mangaadi">
            <?php
                include("baglanti.php");

                $sqlkomut = "SELECT adi FROM manga ORDER BY adi ASC";
                $islem = $baglanti->query($sqlkomut);
        
                if($islem->num_rows > 0){
                  while($manga = $islem->fetch_assoc()){
                    $mangaAdi = $manga["adi"];
                    $mangaAdiREPLACE = strtolower($mangaAdi);
                    $mangaAdiREPLACE = str_replace(" ", "-", $mangaAdiREPLACE);
                    
                    echo "<option value=\"$mangaAdiREPLACE\">$mangaAdi</option>";
                  }
                }  
            ?>
        </select>
        <br>
        <label>Bu işlem geri alınamaz ve manganın bütün bölümleri de beraberinde silinir!</label>
        <br>    
        <input type="submit" name="sil" id="sil" value="Sil">
    </form>
</body>
</html>

<?php
    if(isset($_POST["sil"])){
        
        //Manga adı tanımlama
        $mangaadiREPLACE = null;
        $mangaadiREPLACE = $_POST["mangaadi"];
        $mangaadi = str_replace("-", " ", $mangaadiREPLACE);
        $mangaadiUC = ucwords($mangaadi);

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
                
            $klasorYolu = "mangalar/$mangaadiREPLACE";
                
            if(is_dir($klasorYolu)){
                klasoruSil($klasorYolu);
                echo "Klasör ve içeriği başarıyla silindi.<br>";
            }
            else{
                echo "Klasör bulunamadı ve bu sebeple klasör silinemedi!<br>";
            }

            //Mangayı database'den silme
            include('baglanti.php');
            $sqlkomut2 = "DELETE FROM manga WHERE adi = \"$mangaadiUC\"";
            if($baglanti->query($sqlkomut2) === true){
                echo "Manga database'den başarıyla silindi.<br>";
            }
            else{
                echo "Manga database'den silinemedi!<br>";
            }

            //Mangaya ait bölümleri database'den silme
            $sqlkomut3 = "DELETE FROM bolum WHERE adi = \"$mangaadiUC\"";
            if($baglanti->query($sqlkomut3) === true){
                echo "Mangaya ait bölümler database'den başarıyla silindi.<br>";
            }
            else{
                echo "Mangaya ait bölümler database'den silinemedi!<br>";
            }
        }
        else{
            echo "Eksik değer!";
        }
    }
?>