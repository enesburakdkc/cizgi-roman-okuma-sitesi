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
    <title>Manga Düzenle 1</title>
    <style> *{margin-bottom: 1rem;} </style>
</head>
<body>
    <a href="../">Ana Sayfa'ya Git</a>
    <form action="mangaduzenle2.php" method="post">
        <label for="mangaadi">Manga Seçiniz: </label>
        <select name="mangaadi" id="mangaadi">
            <?php
                include("baglanti.php");

                $sqlkomut = "SELECT adi FROM manga ORDER BY adi ASC";
                $islem = $baglanti->query($sqlkomut);
        
                if($islem->num_rows > 0){
                    while($manga = $islem->fetch_assoc()){
                        $mangaAdi = $manga["adi"];
                    
                        echo "<option value=\"$mangaAdi\">$mangaAdi</option>";
                    }
                }  
            ?>
        </select>
        <br>
        <input type="submit" name="devamet" id="devamet" value="Devam Et">
    </form>
</body>
</html>