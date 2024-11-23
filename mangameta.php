<?php
    echo "
    <meta name=\"description\" content=\"Çeviri Manga $adi manga, $ikinciAdi manga. Çeviri Manga $adi oku, $ikinciAdi oku.\" />
    <meta name=\"keywords\" content=\"çeviri manga, çevirimanga, cevirimanga, $adi manga, $ikinciAdi manga, $adi manga oku, $ikinciAdi manga oku,\" />
    <meta name=\"author\" content=\"Çeviri Manga\" />
    <meta name=\"robots\" content=\"index, follow\" />
    <title>".$adi." Oku"; if($renkBilgisi == "Renkli" && $tur !== "Webtoon"){ echo " [Renkli]";}; echo "</title>
";
?>