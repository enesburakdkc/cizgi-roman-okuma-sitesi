<?php
  $arananKategoriREPLACE = trim($arananKategori);
  $arananKategoriREPLACE = strtolower($arananKategoriREPLACE);
  $arananKategoriREPLACE = str_replace(" ", "-", $arananKategoriREPLACE);

  $turkceKarakterler = array('ç', 'ğ', 'ı', 'ö', 'ş', 'ü', 'Ç', 'Ğ', 'İ', 'Ö', 'Ş', 'Ü');
  $ingilizceKarakterler = array('c', 'g', 'i', 'o', 's', 'u', 'C', 'G', 'I', 'O', 'S', 'U');
  $arananKategoriREPLACE = str_replace($turkceKarakterler, $ingilizceKarakterler, $arananKategoriREPLACE);
?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include("kategorimeta.php"); ?>
  <link rel="canonical" href="https://www.cevirimanga.com/kategoriler/<?php echo $arananKategoriREPLACE; ?>.php" />
  <link rel="stylesheet" href="../<?php include("cssadi.php"); ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
</head>

<body>
  <!--header section start-->
  <?php include("../headerforkategori.php"); ?>
  <!--header section end-->

  <!--kategori section start-->
  <section class="kategori">
    <div class="baslik">
      <h1><?php echo $arananKategori; ?> Manga / Webtoon</h1>
    </div>
    <div class="containerkategori">
    
    <?php
        include("../baglanti.php");

        $sqlkomut = "SELECT adi FROM manga WHERE kategori LIKE \"%$arananKategori%\"";
        $islem = $baglanti->query($sqlkomut);

        if($islem->num_rows > 0){
          while($manga = $islem->fetch_assoc()){
            $mangaAdi = $manga["adi"];
            $mangaAdiREPLACE = strtolower($mangaAdi);
            $mangaAdiREPLACE = str_replace(" ", "-", $mangaAdiREPLACE);

            echo "
<div class='manga'>
  <div class='mangaresim'>
    <a href=\"../mangalar/$mangaAdiREPLACE/$mangaAdiREPLACE.php\">
      <img src=\"../mangalar/$mangaAdiREPLACE/kapak-resmi/$mangaAdiREPLACE.jpg\" alt=\"$mangaAdi\" />
    </a>
  </div>
  <div class='mangatext'>
    <a href=\"../mangalar/$mangaAdiREPLACE/$mangaAdiREPLACE.php\">
      <h3>$mangaAdi</h3>
    </a>
  </div>
</div>
";
          }
        }
    ?>

    </div>
  </section>
  <!--kategori section end-->

  <!--uptotop section start-->
  <button id="scrollToTopBtn"><i class="fa-solid fa-arrow-up-long"></i></button>
  <script src="../script.js" type="module"></script>
  <!--uptotop section end-->

  <!--footer section start-->
  <?php include("../footer.php"); ?>
  <!--footer section end-->

  <!--cookies section start-->
  <?php include("cookies.php"); ?>
  <!--cookies section end-->

  <?php $baglanti->close(); ?>

</body>

</html>