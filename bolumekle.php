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
    <title>Bölüm Ekle</title>
    <style> *{margin-bottom: 1rem;} </style>
</head>
<body>
    <a href="../">Ana Sayfa'ya Git</a>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <label for="mangaadi">Manga Seçiniz: </label>
        <select name="mangaadi" id="mangaadi">
            <option value="">-------Manga Seçiniz-------</option>
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
        <label for="bolumsayisi">Kaçıncı Bölümü Ekleyeceğinizi Seçin: </label>
        <input type="number" step="0.1" name="bolumsayisi" id="bolumsayisi">
        <br>
        <label for="bolumadi">Bölümün Adını Giriniz: </label>
        <input type="text" name="bolumadi" id="bolumadi">
        <label for="bolumadi">Bağlaçlar hariç baş harfleri büyük giriniz. (Yok ise boş bırakın ama var ise mutlaka giriniz.)</label>
        <br>
        <label for='renkbilgisi'>Renk Bilgisi: </label>
        <select name='renkbilgisi' id='renkbilgisi'>
            <option value='Renksiz'>Renksiz</option>
            <option value='Renkli'>Renkli</option>
        </select>
        <br>
        <label for="cevirmenadi">Çevirmen Adı: </label>
        <input type="text" name="cevirmenadi" id="cevirmenadi">
        <br>
        <label for="editoradi">Editör Adı: </label>
        <input type="text" name="editoradi" id="editoradi">
        <br>
        <label for="resimler">Resim Dosyalarını Seçiniz: </label>
        <input type="file" name="resimler[]" id="resimler" multiple accept="image/*">
        <label for="resimler">Dosyalar resim formatında olmalı.</label>
        <br>
        <input type="submit" name="onayla" id="onayla" value="Onayla">
    </form>
</body>
</html>

<?php
    if(isset($_POST["onayla"])){
        
        //Manga adı tanımlama
        $mangaadiREPLACE = null;
        $mangaadiREPLACE = $_POST["mangaadi"];
        $mangaadi = str_replace("-", " ", $mangaadiREPLACE);
        $mangaadiUC = ucwords($mangaadi);

        //Manga ikinci adı tanımlama
        $sqlkomut = "SELECT ikinciAdi FROM manga WHERE adi = \"$mangaadiUC\"";
        $islem = $baglanti->query($sqlkomut);
        if($islem->num_rows > 0){
            $deger = $islem->fetch_object();

            $mangaikinciadiUC = $deger->ikinciAdi;
            $mangaikinciadiREPLACE = strtolower($mangaikinciadiUC);
            $mangaikinciadiREPLACE = str_replace(" ", "-", $mangaikinciadiREPLACE);
        }

        //Manga bölüm adı tanımlama
        $bolumadi = null;
        $bolumadi = $_POST["bolumadi"];
        $bolumadi = trim($bolumadi);
        $bolumadi = str_replace('"','\"', $bolumadi);

        //Manga bölüm sayısı tanımlama
        $bolumsayisi = null;
        $bolumsayisi = $_POST["bolumsayisi"];

        //Çevirmen Adı tanımlama
        $cevirmen = null;
        $cevirmen = $_POST["cevirmenadi"];

        //Çevirmen Adı tanımlama
        $editor = null;
        $editor = $_POST["editoradi"];

        //Resimleri tanımlama
        $resimler = $_FILES['resimler']['name'];
        $resimsayisi = count($resimler);

        //Renk bilgisi tanımlama
        $renkBilgisi = null;
        $renkBilgisi = $_POST['renkbilgisi'];
        
        if($mangaadiREPLACE != "" && $bolumsayisi != "" && $_FILES["resimler"]){
            if(!file_exists("mangalar/$mangaadiREPLACE/bolumler/$bolumsayisi")){
                //Dosyaları oluşturma                
                mkdir("mangalar/$mangaadiREPLACE/bolumler/$bolumsayisi", 0755);
                fopen("mangalar/$mangaadiREPLACE/bolumler/$bolumsayisi/".$mangaadiREPLACE."-bolum-".$bolumsayisi.".php", "w");
                if(is_dir("mangalar/$mangaadiREPLACE/bolumler/$bolumsayisi")){
                    echo "Bölüm klasörü başarıyla oluşturuldu.<br>";
                }
                else{
                    echo "Bölüm klasörü oluşturulamadı!<br>";
                }

                //Resimleri ekleme
                for($i = 0; $i < $resimsayisi; $i++){
                    
                    $hedefdosya = "mangalar/$mangaadiREPLACE/bolumler/$bolumsayisi/".basename($_FILES['resimler']['name'][$i]);
                    $resimuzantisi = strtolower(pathinfo($hedefdosya, PATHINFO_EXTENSION));

                    if(move_uploaded_file($_FILES['resimler']['tmp_name'][$i], $hedefdosya)){
                        echo "Resim başarıyla yüklendi: ".htmlspecialchars(basename($_FILES['resimler']['name'][$i]))."<br>";
                    }
                    else{
                        echo "Resim yüklenirken bir hata oluştu!<br>";
                    }
                }

                //İlişkisel veri tabanı bağlantısı oluşturma
                $sqlkomut3 = "SELECT * FROM manga WHERE adi = \"$mangaadiUC\"";
                $islem3 = $baglanti->query($sqlkomut3);
                if($islem3->num_rows > 0){
                    $degerler3 = $islem3->fetch_object();
                
                    $adi = $degerler3->adi;
                    $ikinciAdi = $degerler3->ikinciAdi;
                    $konusu = $degerler3->konusu;
                    $tur = $degerler3->tur;
                    $puani = $degerler3->puani;
                    $durumu = $degerler3->durumu;
                    $yas = $degerler3->yas;
                    $kategori = $degerler3->kategori;
                    $eklenmeTarihi = $degerler3->eklenmeTarihi;
                
                    $adiREPLACE = trim($adi);
                    $adiREPLACE = strtolower($adiREPLACE);
                    $adiREPLACE = str_replace(' ', '-', $adiREPLACE);
                }

                //Bölümü database'ye kaydetme
                include('baglanti.php');
                $sqlkomut2 = "INSERT INTO bolum (adi, ikinciAdi, bolumAdi, bolumSayisi, cevirmen, editor, eklenmeTarihi, tur, renkBilgisi, yas) VALUES (\"$mangaadiUC\", \"$mangaikinciadiUC\", \"$bolumadi\", \"$bolumsayisi\", \"$cevirmen\", \"$editor\", NOW(), \"$tur\", \"$renkBilgisi\", \"$yas\")";
                if($baglanti->query($sqlkomut2) === true){
                    echo "Bölüm database'ye eklendi.<br>";
                }
                else{
                    echo "Manga database'ye eklenemedi!<br>";
                }

                //Manga bölümü.php sitesinin içeriğini oluşturma
                $bolumphp = 
"<?php
    \$arananManganinAdi = \"$mangaadiUC\";
    \$arananBolumSayisi = \"$bolumsayisi\";

    include('../../../../bolumsayfasi.php');
?>";

                //Düzenlenen bölüm dosyasını yerine geri yerleştirme
                file_put_contents("mangalar/$mangaadiREPLACE/bolumler/$bolumsayisi/$mangaadiREPLACE"."-bolum-"."$bolumsayisi.php", $bolumphp);

            }
            else{
                echo "Bu bölümün dosyları zaten mevcut!";
            }
        }
        else{
            echo "Eksik değer!";
        }
    }
?>