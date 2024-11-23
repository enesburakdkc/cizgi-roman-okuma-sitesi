<?php
    include('../../baglanti.php');
                    
    $sqlkomut = "SELECT * FROM manga WHERE adi = \"$arananManganinAdi\"";
                    
    $islem = $baglanti->query($sqlkomut);
                    
    if($islem->num_rows > 0){
        $degerler = $islem->fetch_object();

        $adi = $degerler->adi;
        $ikinciAdi = $degerler->ikinciAdi;
        $konusu = $degerler->konusu;
        $tur = $degerler->tur;
        $renkBilgisi = $degerler->renkBilgisi;
        $puani = $degerler->puani;
        $durumu = $degerler->durumu;
        $yas = $degerler->yas;
        $kategori = $degerler->kategori;
        $eklenmeTarihi = $degerler->eklenmeTarihi;

        $adiREPLACE = trim($adi);
        $adiREPLACE = strtolower($adiREPLACE);
        $adiREPLACE = str_replace(' ', '-', $adiREPLACE);
    }
    //İlk bölüm bilgisi
    $sqlkomut2 = "SELECT MIN(bolumSayisi) AS minBolumSayisi FROM bolum WHERE adi = \"$adi\"";

    $islem2 = $baglanti->query($sqlkomut2);

    if($islem2->num_rows > 0){
        $degerler2 = $islem2->fetch_assoc();
    
        //NULL olmasına rağmen 0'dan büyük değer döndüğü için bu şekilde sorguladık.
        if (!is_null($degerler2["minBolumSayisi"])) {
            $minBolumSayisi = $degerler2["minBolumSayisi"];
    
            $minBolumSayfasi = "bolumler/".$minBolumSayisi."/".$adiREPLACE."-bolum-".$minBolumSayisi.".php";
        } else {
            // minBolumSayisi NULL, yani uygun bölüm bulunamadı.
            $minBolumSayisi = 0;
            $minBolumSayfasi = "#";
        }
    }
    else{
        $minBolumSayisi = 0;
        $minBolumSayfasi = "#";
    }
    //Son bölüm bilgisi
    $sqlkomut3 = "SELECT MAX(bolumSayisi) AS maxBolumSayisi FROM bolum WHERE adi = \"$adi\"";

    $islem3 = $baglanti->query($sqlkomut3);

    if($islem3->num_rows > 0){
        $degerler3 = $islem3->fetch_assoc();
    
        //NULL olmasına rağmen 0'dan büyük değer döndüğü için bu şekilde sorguladık.
        if (!is_null($degerler3["maxBolumSayisi"])) {
            $maxBolumSayisi = $degerler3["maxBolumSayisi"];
    
            $maxBolumSayfasi = "bolumler/".$maxBolumSayisi."/".$adiREPLACE."-bolum-".$maxBolumSayisi.".php";
        } else {
            // maxBolumSayisi NULL, yani uygun bölüm bulunamadı.
            $maxBolumSayisi = 0;
            $maxBolumSayfasi = "#";
        }
    }
    else{
        $maxBolumSayisi = 0;
        $maxBolumSayfasi = "#";
    }
?>