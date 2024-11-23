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
    <title>Manga Ekle</title>
    <style> *{margin-bottom: 1rem;} </style>
</head>
<body>
    <a href='../'>Ana Sayfa'ya Git</a>
    <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' enctype='multipart/form-data'>
        <label for='mangaadi'>Manganın Popüler Adını Giriniz: </label>
        <input type='text' name='mangaadi' id='mangaadi'>
        <label for='mangaadi'>\/:*?<>-| işaretlerini kullanmayınız!</label>
        <br>
        <label for='mangaikinciadi'>Manganın 2.Adını Giriniz: </label>
        <input type='text' name='mangaikinciadi' id='mangaikinciadi'>
        <label for='mangaikinciadi'>\/:*?<>-| işaretlerini kullanmayınız! (Yok ise boş bırakın.)</label>
        <br>
        <label for='konu'>Konusu:</label>
        <textarea name='konu' id='konu'rows="10" cols="40"></textarea>
        <label for='konu'>Konuyu uzunca bir text olarak kopyala yapıştır yapabilirsiniz. Yazım kurallarına dikkat ederek metin girin!</label>
        <br>
        <label for='tur'>Tür: </label>
        <select name='tur' id='tur'>
            <option value='Manga'>Manga</option>
            <option value='Webtoon'>Webtoon</option>
        </select>
        <br>
        <label for='renkbilgisi'>Renk Bilgisi: </label>
        <select name='renkbilgisi' id='renkbilgisi'>
            <option value='Renksiz'>Renksiz</option>
            <option value='Renkli'>Renkli</option>
        </select>
        <br>
        <label for='puan'>Manganın MyAnimeList Puanı: </label>
        <input type='text' name='puan' id='puan'>
        <br>
        <label for='durumu'>Devam etme durumu: </label>
        <select name='durumu' id='durumu'>
            <option value='Devam ediyor'>Devam ediyor</option>
            <option value='Bitti'>Bitti</option>
        </select>
        <br>
        <label for='yas'>Yaş Sınırı: </label>
        <select name='yas' id='yas'>
            <option value='13'>+13</option>
            <option value='14'>+14</option>
            <option value='15'>+15</option>
            <option value='16'>+16</option>
            <option value='17'>+17</option>
            <option value='18'>+18</option>
        </select>
        <br>
        <label for='kategoriler'>Kategorileri: </label>
        <input type='text' name='kategoriler' id='kategoriler'>
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

            //Manga konu tanımalama
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

    
    
            if($mangaadi != '' && $_FILES['kapakresmi'] && $puan != '' && $durumu != '' && $kategoriler != ''){
                if(!file_exists("mangalar/$mangaadiREPLACE")){
                    //Dosyaları oluşturma
                    mkdir("mangalar/$mangaadiREPLACE", 0755);
                    mkdir("mangalar/$mangaadiREPLACE/bolumler", 0755);
                    mkdir("mangalar/$mangaadiREPLACE/kapak-resmi", 0755);
                    move_uploaded_file($_FILES['kapakresmi']['tmp_name'], "mangalar/$mangaadiREPLACE/kapak-resmi/$mangaadiREPLACE.$kapakresmiuzantisi");
                    fopen("mangalar/$mangaadiREPLACE/$mangaadiREPLACE.php", 'w');
                    if(is_dir("mangalar/$mangaadiREPLACE")){
                        echo "Manga klasörü başarıyla oluşturuldu.<br>";
                    }
                    else{
                        echo "Manga klasörü oluşturulamadı!<br>";
                    }
    
                    //Mangayı database'ye kaydetme
                    include('baglanti.php');
                    $sqlkomut = "INSERT INTO manga (adi, ikinciAdi, konusu, tur, renkBilgisi, puani, durumu, yas, kategori, eklenmeTarihi) VALUES (\"$mangaadiUC\", \"$mangaikinciadiUC\", \"$konu\", \"$tur\", \"$renkbilgisi\", \"$puan\", \"$durumu\", \"$yas\", \"$kategoriler\", NOW())";
                    if($baglanti->query($sqlkomut) === true){
                        echo "Manga database'ye başarıyla eklendi.<br>";
                    }
                    else{
                        echo "Manga database'ye eklenemedi!<br>";
                    }
    
                    //Manga.php sitesinin içeriğini oluşturma
                    $mangaphp = "<?php
    \$arananManganinAdi = \"$mangaadiUC\";
                
    include('../../mangasayfasi.php');
?>";
    
                    //Düzenlenen manga dosyasını yerine geri yerleştirme
                    file_put_contents("mangalar/$mangaadiREPLACE/$mangaadiREPLACE.php", $mangaphp);
                }
                else{
                    echo 'Bu manga zaten kayıtlı!';
                }
                
            }
           else{
            echo 'Eksik değer!';
           }
        }
    ?>
             
</body>
</html>