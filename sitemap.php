<?php
    $dbConfig = array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'cevirimanga'
    );

    $baglanti = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['database']);

    if($baglanti->connect_error){
        die("Database bağlantısı başarısız: ".$baglanti->connect_error);
    }

    $baseURL = "https://cevirimanga.com/";

    header("Content-Type: application/xml; charset=utf-8");
    echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'.PHP_EOL;

    $sqlkomut = "SELECT DISTINCT adi FROM manga";
    $stmt = $baglanti->prepare($sqlkomut);
    $stmt->execute();
    $islem = $stmt->get_result();

        if($islem->num_rows > 0){
          while($manga = $islem->fetch_assoc()){
            $mangaAdi = $manga["adi"];
            $mangaAdiREPLACE = strtolower($mangaAdi);
            $mangaAdiREPLACE = str_replace(" ", "-", $mangaAdiREPLACE);

            $mangaURL = "mangalar/$mangaAdiREPLACE/$mangaAdiREPLACE.php";

            echo '<url>'.PHP_EOL;
            echo '<loc>'.$baseURL.$mangaURL.'</loc>'.PHP_EOL;
            echo '<changefreq>daily</changefreq>'.PHP_EOL;
            echo '</url>'.PHP_EOL;

            $sqlkomut4 = "SELECT bolumSayisi FROM bolum WHERE adi = \"$mangaAdi\" ORDER BY bolumSayisi ASC";
        
            $stmt4 = $baglanti->prepare($sqlkomut4);
            $stmt4->execute();
            $islem4 = $stmt4->get_result();
        
            if($islem4->num_rows > 0){
                while($degerler4 = $islem4->fetch_assoc()){
                    $bolumlerinSayisi = $degerler4['bolumSayisi'];
                    $bolumURL = "mangalar/$mangaAdiREPLACE/bolumler/$bolumlerinSayisi/$mangaAdiREPLACE"."-bolum-"."$bolumlerinSayisi.php";
                    echo '<url>'.PHP_EOL;
                    echo '<loc>'.$baseURL.$bolumURL.'</loc>'.PHP_EOL;
                    echo '<changefreq>daily</changefreq>'.PHP_EOL;
                    echo '</url>'.PHP_EOL;
                }
            }
          }
        }
    echo '</urlset>'.PHP_EOL;
?>