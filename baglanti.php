<?php
    include("config.php");

    $baglanti = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['database']);
    $baglanti->set_charset("utf8mb4");

    if($baglanti->connect_error){
        die("Database bağlantısı başarısız: ".$baglanti->connect_error);
    }
?>