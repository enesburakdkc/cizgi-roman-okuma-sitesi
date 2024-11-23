<?php
    include('../../../../baglanti.php');
    
    $sqlkomut = "SELECT * FROM bolum WHERE adi = \"$arananManganinAdi\" AND bolumSayisi = \"$arananBolumSayisi\"";

    $islem = $baglanti->query($sqlkomut);

    if($islem->num_rows > 0){
        $degerler = $islem->fetch_object();

        $adi = $degerler->adi;
        $ikinciAdi = $degerler->ikinciAdi;
        $bolumAdi = $degerler->bolumAdi;
        $bolumSayisi = $degerler->bolumSayisi;
        $cevirmenAdi = $degerler->cevirmen;
        $editorAdi = $degerler->editor;
        $eklenmeTarihi = $degerler->eklenmeTarihi;
        $tur = $degerler->tur;
        $renkBilgisi = $degerler->renkBilgisi;
        $yas = $degerler->yas;

        $adiREPLACE = trim($adi);
        $adiREPLACE = strtolower($adiREPLACE);
        $adiREPLACE = str_replace(" ", "-", $adiREPLACE);
    }
    //Önceki bölüm bilgisi sorgulama
    $sqlkomut2 = "SELECT bolumSayisi FROM bolum WHERE adi = \"$arananManganinAdi\" AND bolumSayisi < $bolumSayisi ORDER BY bolumSayisi DESC LIMIT 1";
    $islem2 = $baglanti->query($sqlkomut2);
    if($islem2->num_rows > 0){
        $degerler2 = $islem2->fetch_assoc();
        $oncekiBolumSayisi = $degerler2["bolumSayisi"];
        $oncekiBolumSayfasi = "../".$oncekiBolumSayisi."/".$adiREPLACE."-bolum-".$oncekiBolumSayisi.".php";
        $oncekiBolumBilgisi = true;
    }
    else{
        $oncekiBolumSayfasi = "#";
        $oncekiBolumBilgisi = false;
    }
    //Sonraki bölüm bilgisi sorgulama
    $sqlkomut3 = "SELECT bolumSayisi FROM bolum WHERE adi = \"$arananManganinAdi\" AND bolumSayisi > $bolumSayisi ORDER BY bolumSayisi ASC LIMIT 1";
    $islem3 = $baglanti->query($sqlkomut3);
    if($islem3->num_rows > 0){
        $degerler3 = $islem3->fetch_assoc();
        $sonrakiBolumSayisi = $degerler3["bolumSayisi"];
        $sonrakiBolumSayfasi = "../".$sonrakiBolumSayisi."/".$adiREPLACE."-bolum-".$sonrakiBolumSayisi.".php";
        $sonrakiBolumBilgisi = true;
    }
    else{
        $sonrakiBolumSayfasi = "#";
        $sonrakiBolumBilgisi = false;
    }
?>