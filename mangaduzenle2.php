<?php
    session_start();
    if(!isset($_SESSION["kullaniciAdiSoyadi"])){
        header("location: admingirisi.php");
    }

    if(isset($_POST["mangaadi"])){
        $mangaAdi = null;
        $mangaAdi = $_POST["mangaadi"];
    }

    include("baglanti.php");
    $sqlkomut2 = "SELECT * FROM manga WHERE adi = \"$mangaAdi\"";
    $islem2 = $baglanti->query($sqlkomut2);

    if($islem2->num_rows > 0){
        $degerler = $islem2->fetch_object();
        $id2 = $degerler->id;
        $mangaadi2 = $degerler->adi;
        $mangaikinciadi2 = $degerler->ikinciAdi;
        $konu2 = $degerler->konusu;
        $tur2 = $degerler->tur;
        $renkbilgisi2 = $degerler->renkBilgisi;
        $puan2 = $degerler->puani;
        $durumu2 = $degerler->durumu;
        $yas2 = $degerler->yas;
        $kategoriler2 = $degerler->kategori;
        $eklenmeTarihi2 = $degerler->eklenmeTarihi;
    }
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manga Ekle</title>
    <style> *{margin-bottom: 1rem;} </style>
</head>
<body>
    <a href='../'>Ana Sayfa'ya Git</a>
    <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' enctype='multipart/form-data'>
        <label for='mangaadi'>Manganın Popüler Adını Giriniz: </label>
        <input type='text' name='mangaadi' id='mangaadi' value='<?php echo $mangaadi2; ?>' readonly style='opacity: 0.8; cursor: not-allowed;'></input>
        <label for='mangaadi'>Popüler ad değiştirilemez!</label>
        <br>
        <label for='mangaikinciadi'>Manganın 2.Adını Giriniz: </label>
        <input type='text' name='mangaikinciadi' id='mangaikinciadi' value='<?php echo $mangaikinciadi2; ?>'>
        <label for='mangaikinciadi'>\/:*?<>-| işaretlerini kullanmayınız! (Yok ise boş bırakın.)</label>
        <br>
        <label for='konu'>Konusu:</label>
        <textarea name='konu' id='konu'rows="10" cols="40"><?php echo $konu2; ?></textarea>
        <label for='konu'>Konuyu uzunca bir text olarak kopyala yapıştır yapabilirsiniz. Yazım kurallarına dikkat ederek metin girin!</label>
        <br>
        <label for='tur'>Tür: </label>
        <select name='tur' id='tur'>
            <option value='Manga' <?php if($tur2 == 'Manga') echo 'selected'; ?>>Manga</option>
            <option value='Webtoon' <?php if($tur2 == 'Webtoon') echo 'selected'; ?>>Webtoon</option>
        </select>
        <br>
        <label for='renkbilgisi'>Renk Bilgisi: </label>
        <select name='renkbilgisi' id='renkbilgisi'>
            <option value='Renksiz' <?php if($renkbilgisi2 == 'Renksiz') echo 'selected'; ?>>Renksiz</option>
            <option value='Renkli' <?php if($renkbilgisi2 == 'Renkli') echo 'selected'; ?>>Renkli</option>
        </select>
        <br>
        <label for='puan'>Manganın MyAnimeList Puanı: </label>
        <input type='text' name='puan' id='puan' value='<?php echo $puan2; ?>'>
        <br>
        <label for='durumu' value='<?php echo $durumu2; ?>'>Devam etme durumu: </label>
        <select name='durumu' id='durumu'>
            <option value='Devam ediyor' <?php if($durumu2 == 'Devam ediyor') echo 'selected'; ?>>Devam ediyor</option>
            <option value='Bitti' <?php if($durumu2 == 'Bitti') echo 'selected'; ?>>Bitti</option>
        </select>
        <br>
        <label for='yas'>Yaş Sınırı: </label>
        <select name='yas' id='yas'>
            <option value='13' <?php if($yas2 == '13') echo 'selected'; ?>>+13</option>
            <option value='14' <?php if($yas2 == '14') echo 'selected'; ?>>+14</option>
            <option value='15' <?php if($yas2 == '15') echo 'selected'; ?>>+15</option>
            <option value='16' <?php if($yas2 == '16') echo 'selected'; ?>>+16</option>
            <option value='17' <?php if($yas2 == '17') echo 'selected'; ?>>+17</option>
            <option value='18' <?php if($yas2 == '18') echo 'selected'; ?>>+18</option>
        </select>
        <br>
        <label for='kategoriler'>Kategorileri: </label>
        <input type='text' name='kategoriler' id='kategoriler' value='<?php echo $kategoriler2; ?>'>
        <label for='kategoriler'>Örnek yazım şekli:Aksiyon, Macera, Ödüllü</label>
        <br>
        <div>Kategorilerin düzgün yazımlı şekilleri: Aksiyon, Avangart, Bilim Kurgu, Doğaüstü, Drama, Erkeklerin Aşkı, Fantezi, Gerilim, Gizem, Gurme, Hayattan Kesitler, Kızların Aşkı, Komedi, Korku, Macera, Ödüllü, Romantik, Spor</div>
        <br>
        <label for='kapakresmi'>Kapak Fotoğrafını Giriniz:</label>
        <input type='file' name='kapakresmi' id='kapakresmi'>
        <label for="kapakresmi">Resim 2:3 oranında ve .jpg uzantılı olmak zorunda!</label>
        <br>
        <input type='submit' name='onayla' id='onayla' value='Onayla'>
    </form>
            
    <?php
        if(isset($_POST['onayla'])){
            //Manga adı tanımlama
            $mangaadi = null;
            $mangaadi = $_POST['mangaadi'];
            $mangaadi = trim($mangaadi);
            $mangaadi = strtolower($mangaadi);
            $mangaadiREPLACE = str_replace(' ', '-', $mangaadi);
            $mangaadiUC = ucwords($mangaadi);

            //Manga 2. adı tanımlama
            $mangaikinciadi = null;
            $mangaikinciadi = $_POST['mangaikinciadi'];
            $mangaikinciadi = trim($mangaikinciadi);
            $mangaikinciadi = strtolower($mangaikinciadi);
            $mangaikinciadiREPLACE = str_replace(' ', '-', $mangaikinciadi);
            $mangaikinciadiUC = ucwords($mangaikinciadi);

            //Manga konu
            $konu = null;
            $konu = $_POST['konu'];
            $konu = str_replace('"','\"', $konu);

            //Manga türü tanımalama
            $tur = null;
            $tur = $_POST['tur'];

            //Renk bilgisi tanımlama
            $renkbilgisi = null;
            $renkbilgisi = $_POST['renkbilgisi'];

            //Manga puan tanımlama
            $puan = null;
            $puan = $_POST['puan'];
            $puan = trim($puan);

            //Manga durumu
            $durumu = null;
            $durumu = $_POST['durumu'];

            //Yaş kısıtlaması tanımlama
            $yas = null;
            $yas = $_POST['yas'];

            //Manga kategoriler
            $kategoriler = null;
            $kategoriler = $_POST['kategoriler'];
            $kategoriler = trim($kategoriler);
            $kategoriler = strtolower($kategoriler);
            $kategoriler = ucwords($kategoriler);

            //Manga kapak resmi tanımlama
            $kapakresmi = null;
            $kapakresmi = $_FILES['kapakresmi']['name'];
            $kapakresmi = basename($kapakresmi);
            $kapakresmiuzantisi = pathinfo($kapakresmi, PATHINFO_EXTENSION);
            
            //Dosyaları oluşturma                    
            if(move_uploaded_file($_FILES['kapakresmi']['tmp_name'], "mangalar/$mangaadiREPLACE/kapak-resmi/$mangaadiREPLACE.$kapakresmiuzantisi")){
                echo "Manga görseli başarıyla değiştirildi.<br>";
            }
            else{
                echo "Manga görseli değiştirilemedi!<br>";
            }

            //Mangayı database'ye kaydetme
            include('baglanti.php');
            $sqlkomut = "UPDATE manga SET ikinciAdi = \"$mangaikinciadiUC\", konusu = \"$konu\", tur = \"$tur\", renkBilgisi = \"$renkbilgisi\", puani = \"$puan\", durumu = \"$durumu\", yas = \"$yas\", kategori = \"$kategoriler\" WHERE id = \"$id2\"";
            if($baglanti->query($sqlkomut) === true){
                echo "Manga database'si başarıyla güncellendi.<br>";
            }
            else{
                echo "Manga database'si güncellenemedi!<br>";
            }

            //Bölümlerinin özelliklerini güncelleme
            $sqlkomut3 = "UPDATE bolum SET tur = \"$tur\", yas = \"$yas\" WHERE adi = \"$mangaadiUC\"";
            if($baglanti->query($sqlkomut3) === true){
                echo "Manga bölümlerinin database özellikleri başarıyla güncellendi.<br>";
            }
            else{
                echo "Manga bölümlerinin database özellikleri güncellenemedi!<br>";
            }
        }
    ?>
             
</body>
</html>