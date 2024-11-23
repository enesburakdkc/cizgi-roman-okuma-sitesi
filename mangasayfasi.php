<?php
    include('../../mangasorgu.php');
?>

<!DOCTYPE html>
<html lang='tr'>
                
<head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <?php include('../../mangameta.php') ?>
    <link rel="canonical" href="https://www.cevirimanga.com/mangalar/<?php echo $adiREPLACE; ?>/<?php echo $adiREPLACE; ?>.php" />
    <link rel='stylesheet' href='../../<?php include("cssadi.php"); ?>' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css' integrity='sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==' crossorigin='anonymous' referrerpolicy='no-referrer' />
    <link rel="icon" href="../../images/favicon.ico" type="image/x-icon" />
    <!--reklamlar-->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4727424928067159" crossorigin="anonymous"></script>
</head>
                
<body>
    <!--header section start-->
    <?php include('../../headerformanga.php'); ?>
    <!--header section end-->
                
    <!--info section start-->
    <section class='info'>
        <div class='containermanga'>
            <div class='containermangaresimbilgi'>
                <div class='resim'>
                    <img src="kapak-resmi/<?php echo $adiREPLACE; ?>.jpg" alt="<?php echo $adiREPLACE; ?>">
                </div>
                <div class='bilgi'>
                    <div class='puan'>
                        <p>Puanı:</p>
                        <p><?php echo $puani; ?></p>
                    </div>
                    <div class='bolumsayisi'>
                        <p>Bölüm Sayısı:</p>
                        <p><?php echo $maxBolumSayisi; ?></p>
                    </div>
                    <div class='durum'>
                        <p>Durumu:</p>
                        <p><?php echo $durumu; ?></p>
                    </div>
                    <div class='kategori'>
                        Kategori:
                        <?php echo $kategori; ?>
                    </div>
                    <div class='yas'>
                        Yaş Sınırı:
                        <?php echo "+".$yas; ?>
                    </div>
                </div>
            </div>
            <div class='containermangaadkonu'>
                <div class='mangaadi'>
                    <h1><?php echo $adi; if($renkBilgisi == 'Renkli' && $tur !== "Webtoon"){ echo ' [Renkli]'; }; ?></h1>
                </div>
                <div class="mangaikinciadi">
                    <h2><?php if($ikinciAdi !== ''){ echo "(".$ikinciAdi.")"; }; ?></h2>
                </div>
                <div class='mangakonu'>
                    <p><?php echo $konusu; ?></p>
                </div>
            </div>
        </div>
        <div class='buttons' style='justify-content: space-between;'>
            <a href="<?php echo $minBolumSayfasi; ?>" class='btn' style='color: var(--second-color);'>İlk Bölüm</a> 
            <a href="<?php echo $maxBolumSayfasi; ?>" class='btn' style='color: var(--second-color);'>Son Bölüm</a> 
        </div>
    </section>
    <!--info section end-->

    <!-- h2 section start -->
    <h2 class='mangah2' style='margin-top: 6rem;'><?php echo $adi; ?> Mangası Hakkında Düşünceleriniz Neler?</h2>
    <!-- h2 section end -->

    <!--disqus section start-->
    <div style='margin: 0 7%; margin-top: 2rem;'>
        <?php include('../../disqusyorum.php'); ?>
    </div>
    <!--disqus section end-->

    <!--uptotop section start-->
    <button id="scrollToTopBtn"><i class="fa-solid fa-arrow-up-long"></i></button>
    <script src="../../script.js" type="module"></script>
    <!--uptotop section end-->

    <!--footer section start-->
    <?php include('../../footer.php'); ?>
    <!--footer section end-->

    <!--cookies section start-->
    <?php include("cookies.php"); ?>
    <!--cookies section end-->
    
    <?php $baglanti->close(); ?>
                
</body>

</html>