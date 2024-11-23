<?php
    $resimler = scandir("../$bolumSayisi");
    natsort($resimler);

    foreach($resimler as $resim){
            
        if($resim != "." && $resim != ".." && $resim != "$adiREPLACE"."-bolum-"."$bolumSayisi.php"){
            echo "
            <img src='$resim' alt='Resim $resim'>
            ";
        }
    }
?>