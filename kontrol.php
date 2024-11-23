<?php
    $kullaniciAdiSoyadi = $_POST["kullaniciadisoyadi"];
    $kullaniciSifre = $_POST["kullanicisifre"];

    include("baglanti.php");

    $sqlkomut = "SELECT * FROM admin WHERE kullaniciAdiSoyadi = ? and kullaniciSifre = ?";

    $stmt = $baglanti->prepare($sqlkomut);
    $stmt->bind_param("ss", $kullaniciAdiSoyadi, $kullaniciSifre);
    $stmt->execute();

    $islem = $stmt->get_result();

    if($islem->num_rows > 0){
        $degerler = $islem->fetch_object();

        $kAdiSoyadi = $degerler->kullaniciAdiSoyadi;
        $kSifre = $degerler->kullaniciSifre;
        $kRol = $degerler->kullaniciRol;

        session_start();
        $_SESSION["kullaniciAdiSoyadi"] = $kAdiSoyadi;
        $_SESSION["kullaniciSifre"] = $kSifre;
        $_SESSION["kullaniciRol"] = $kRol;

        header("location: admingirisi2.php");
    }
    else{
        header("location: admingirisi.php?hata=1");
    }
    $stmt->close();
    $baglanti->close();
?>