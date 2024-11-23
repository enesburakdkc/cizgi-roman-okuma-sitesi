<!DOCTYPE html>
<html lang="tr">

<head>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4727424928067159"
     crossorigin="anonymous"></script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Çeviri Manga bir Türkçe manga okuma sitesidir. Aynı zamanda Çeviri Manga bir Türkçe webtoon okuma sitesidir. Çeviri Manga olarak amacımız okuyuculara güncel manga okumalarını, Türkçe manga okumalarını, güncel Webtoon okumalarını ve Türkçe Webtoon okumalarını sağlayabilmektir." />
  <meta name="keywords" content="çeviri manga, çevirimanga, cevirimanga, manga oku, webtoon oku, türkçe manga oku, türkçe webtoon oku, türkçe manga, türkçe webtoon" />
  <meta name="author" content="Çeviri Manga" />
  <meta name="robots" content="index, follow" />
  <!--Google Ads start-->
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4727424928067159" crossorigin="anonymous"></script>
  <!--Google Ads end-->
  <title>Çeviri Manga - Türkçe Manga ve Webtoon Okuma Sitesi</title>
  <link rel="canonical" href="https://www.cevirimanga.com/" />
  <link rel="stylesheet" href="<?php include("cssadi.php"); ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-GLYYX4QFL0"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  
    gtag('config', 'G-GLYYX4QFL0');
  </script>
  <!---pwa section start-->
  <link rel="manifest" href="manifest.json" />
  <script>
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', function () {
        navigator.serviceWorker.register('/service-worker.js?v=1.1.0');
    	});
    }
  </script>
  <!---pwa section end-->
</head>

<body style='transition: background-color 1.5s ease;'>
  <!--header section start-->
  <?php include("headerforanasayfa.php"); ?>
  <!--header section end-->

  <!--search section start-->
  <div class="anchor" id="search"></div>
  <section class="search">
    <div class="containersearch">
      <form action="searchbox.php" method="get" name="searchform">
        <input type="text" name="aranan" id="aranan" placeholder="Ara" />
        <button type="submit" name="submit" value="submit" style="background-color: transparent; scale: 1.2; margin-right: 1.2rem; cursor: pointer;">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </div>
  </section>
  <!--search section end-->

  <!--populer section start-->
  <div class="anchor" id="populerseriler"></div>
  <section class="populer">
    <div class="baslik">
      <h1>Popüler Seriler</h1>
    </div>
    <div class="containermangalar">

      <?php
        include("baglanti.php");

        $sqlkomut = "SELECT DISTINCT adi FROM manga ORDER BY puani DESC LIMIT 100";
        $islem = $baglanti->query($sqlkomut);

        function kisalt($metin, $uzunluk = 25) {
          // Metnin uzunluğunu kontrol et
          if (mb_strlen($metin) > $uzunluk) {
              // Metni belirtilen uzunluğa kadar kırp
              $metin = mb_substr($metin, 0, $uzunluk);
              // Kırpılan metnin sonuna "..." ekle
              $metin .= '...';
          }
          // Sonucu geri döndür
          return $metin;
        }

        if($islem->num_rows > 0){
          while($manga = $islem->fetch_assoc()){
            $mangaAdi = $manga["adi"];
            $mangaAdiREPLACE = strtolower($mangaAdi);
            $mangaAdiREPLACE = str_replace(" ", "-", $mangaAdiREPLACE);
            $kisaltilmisMetin = kisalt($mangaAdi);

            echo "
<div class=\"manga\">
  <div class=\"mangaresim\">
    <a href=\"mangalar/$mangaAdiREPLACE/$mangaAdiREPLACE.php\">
      <img src=\"mangalar/$mangaAdiREPLACE/kapak-resmi/$mangaAdiREPLACE.jpg\" alt=\"$mangaAdi\" />
    </a>
  </div>
  <div class=\"mangatext\">
    <a href=\"mangalar/$mangaAdiREPLACE/$mangaAdiREPLACE.php\">
      <h3>$kisaltilmisMetin</h3>
    </a>
  </div>
</div>
";
          }
        }
      ?>

    </div>
  </section>
  <!--populer section end-->

  <!--populer section start-->
  <div class="anchor" id="#"></div>
  <section class="populer">
    <div class="baslik">
      <h2>Son Yükelenen Seriler</h2>
    </div>
    <div class="containermangalar">

      <?php
        include("baglanti.php");

        $sqlkomut = "SELECT DISTINCT adi FROM manga ORDER BY eklenmeTarihi DESC LIMIT 100";
        $islem = $baglanti->query($sqlkomut);

        if($islem->num_rows > 0){
          while($manga = $islem->fetch_assoc()){
            $mangaAdi = $manga["adi"];
            $mangaAdiREPLACE = strtolower($mangaAdi);
            $mangaAdiREPLACE = str_replace(" ", "-", $mangaAdiREPLACE);
            $kisaltilmisMetin = kisalt($mangaAdi);

            echo "
<div class=\"manga\">
  <div class=\"mangaresim\">
    <a href=\"mangalar/$mangaAdiREPLACE/$mangaAdiREPLACE.php\">
      <img src=\"mangalar/$mangaAdiREPLACE/kapak-resmi/$mangaAdiREPLACE.jpg\" alt=\"$mangaAdi\" />
    </a>
  </div>
  <div class=\"mangatext\">
    <a href=\"mangalar/$mangaAdiREPLACE/$mangaAdiREPLACE.php\">
      <h3>$kisaltilmisMetin</h3>
    </a>
  </div>
</div>
";
          }
        }
      ?>

    </div>
  </section>
  <!--populer section end-->

  <!--yenibolum section start-->
  <div class="anchor" id="yenibolumler"></div>
  <section class="yenibolum">
    <div class="baslik">
      <h2>Son Yükelenen Bölümler</h2>
    </div>
    <div class="containermangalar">

      <?php
        $sqlkomut2 = "SELECT adi, MAX(eklenmeTarihi) as eklenmeTarihi FROM bolum GROUP BY adi ORDER BY eklenmeTarihi DESC LIMIT 100;";
        $islem2 = $baglanti->query($sqlkomut2);

        if($islem2->num_rows > 0){
          while($bolum = $islem2->fetch_assoc()){
            $bolumAdi = $bolum["adi"];
            $bolumAdiREPLACE = strtolower($bolumAdi);
            $bolumAdiREPLACE = str_replace(" ", "-", $bolumAdiREPLACE);
            $kisaltilmisMetin = kisalt($bolumAdi);

            echo "
<div class=\"manga\">
  <div class=\"mangaresim\">
    <a href=\"mangalar/$bolumAdiREPLACE/$bolumAdiREPLACE.php\">
      <img src=\"mangalar/$bolumAdiREPLACE/kapak-resmi/$bolumAdiREPLACE.jpg\" alt=\"$bolumAdi\" />
    </a>
  </div>
  <div class=\"mangatext\">
    <a href=\"mangalar/$bolumAdiREPLACE/$bolumAdiREPLACE.php\">
      <h3>$kisaltilmisMetin</h3>
    </a>
  </div>
</div>
";
          }
        }
      ?>

    </div>
  </section>
  <!--yenibolum section end-->

  <!--kategoriler section start-->
  <div class="anchor" id="kategoriler"></div>
  <div class="baslik" id="kategorilersection">
    <h2>Kategoriler</h2>
  </div>
  <br />
  <section class="kategoriler">
    <div class="containerkategoriler">
      <a href="kategoriler/aksiyon.php">Aksiyon</a>
      <a href="kategoriler/avangart.php">Avangart</a>
      <a href="kategoriler/bilim-kurgu.php">Bilim Kurgu</a>
      <a href="kategoriler/dogaustu.php">Doğaüstü</a>
      <a href="kategoriler/drama.php">Drama</a>
      <!-- <a href="kategoriler/erkeklerin-aski.php">Erkeklerin Aşkı</a> -->
      <a href="kategoriler/fantezi.php">Fantezi</a>
      <a href="kategoriler/gerilim.php">Gerilim</a>
      <a href="kategoriler/gizem.php">Gizem</a>
      <a href="kategoriler/gurme.php">Gurme</a>
      <a href="kategoriler/hayattan-kesitler.php">Hayattan Kesitler</a>
      <a href="kategoriler/kizlarin-aski.php">Kızların Aşkı</a>
      <a href="kategoriler/komedi.php">Komedi</a>
      <a href="kategoriler/korku.php">Korku</a>
      <a href="kategoriler/macera.php">Macera</a>
      <a href="kategoriler/odullu.php">Ödüllü</a>
      <a href="kategoriler/romantik.php">Romantik</a>
      <a href="kategoriler/spor.php">Spor</a>
    </div>
  </section>
  <!--kategoriler section end-->

  <!--uygulama indir section start-->
  <?php include("uygulamaindir.php"); ?>
  <!--uygulama indir section end-->

  <!--gecicihaberler section start-->
  <div style="margin-top: 6rem; margin-bottom: -4.5rem;">
    <?php include('gecicihaberler.php'); ?>
  </div>
  <!--gecicihaberler section end-->

  <!--uptotop section start-->
  <button id="scrollToTopBtn"><i class="fa-solid fa-arrow-up-long"></i></button>
  <script src="script.js" type="module"></script>
  <!--uptotop section end-->

  <!--footer section start-->
  <?php include("footer.php"); ?>
  <!--footer section end-->

  <?php $baglanti->close(); ?>

  <!--cookies section start-->
  <?php include("cookies.php"); ?>
  <!--cookies section end-->

</body>

</html>  