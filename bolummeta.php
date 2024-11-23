<?php
    echo "
    <meta name=\"description\" content=\"Çeviri Manga $adi manga oku. $adi $bolumSayisi. bölüm oku. Çeviri Manga $ikinciAdi manga oku. $ikinciAdi $bolumSayisi. bölüm oku.\" />
    <meta name=\"keywords\" content=\"çeviri manga, $adi manga oku, $adi $bolumSayisi. bölüm oku, $ikinciAdi manga oku, $ikinciAdi $bolumSayisi. bölüm oku\" />
    <meta name=\"author\" content=\"Çeviri Manga\" />
    <meta name=\"robots\" content=\"index, follow\" />
    <title>".$adi." - Bölüm ".$bolumSayisi; if($renkBilgisi == "Renkli" && $tur !== "Webtoon"){ echo " [Renkli]";}; echo "</title>
";
?>