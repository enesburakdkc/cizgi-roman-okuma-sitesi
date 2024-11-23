<?php
    $arananMangaBaslik = "";
    if(isset($_GET["submit"])){
        $arananManga = "%".$_GET["aranan"]."%";
        $arananMangaBaslik = $_GET["aranan"];
    }
    else{
        $arananManga = " ";
    }
?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Çeviri Manga</title>
  <link rel="stylesheet" href="<?php include("cssadi.php"); ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
</head>

<body>
  <!--header section start-->
  <?php include("headerforsearch.php"); ?>
  <!--header section end-->

  <!--search section start-->
  <div class="anchor" id="search"></div>
  <section class="search">
    <div class="containersearch">
      <form method="get" name="searchform">
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
      <h2>"<?php echo $arananMangaBaslik; ?>" için sonuçlar</h2>
    </div>
    <div class="containermangalar">

      <?php
        include("baglanti.php");

        $sqlkomut = "SELECT adi FROM manga WHERE adi LIKE ? OR ikinciAdi LIKE ? ";
        $stmt = $baglanti->prepare($sqlkomut);
        $stmt->bind_param("ss", $arananManga, $arananManga);
        $stmt->execute();

        $islem = $stmt->get_result();

        if($islem->num_rows > 0){
          while($manga = $islem->fetch_assoc()){
            $mangaAdi = $manga["adi"];
            $mangaAdiREPLACE = strtolower($mangaAdi);
            $mangaAdiREPLACE = str_replace(" ", "-", $mangaAdiREPLACE);

            echo "
<div class='manga'>
  <div class='mangaresim'>
    <a href=\"mangalar/$mangaAdiREPLACE/$mangaAdiREPLACE.php\">
      <img src=\"mangalar/$mangaAdiREPLACE/kapak-resmi/$mangaAdiREPLACE.jpg\" alt=\"$mangaAdi\" />
    </a>
  </div>
  <div class='mangatext'>
    <a href=\"mangalar/$mangaAdiREPLACE/$mangaAdiREPLACE.php\">
      <h3>$mangaAdi</h3>
    </a>
  </div>
</div>
";
          }
        }
        $stmt->close();
      ?>

    </div>
  </section>
  <!--populer section end-->

  <!--uptotop and theme section start-->
  <button id="scrollToTopBtn"><i class="fa-solid fa-arrow-up-long"></i></button>
  <script src="script.js" type="module"></script>
  <!--uptotop and theme section end-->

  <!--footer section start-->
  <?php include("footer.php"); ?>
  <!--footer section end-->

  <!--cookies section start-->
  <?php include("cookies.php"); ?>
  <!--cookies section end-->

  <?php $baglanti->close(); ?>

</body>

</html>