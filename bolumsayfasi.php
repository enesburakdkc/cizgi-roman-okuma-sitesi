<?php
    include('../../../../bolumsorgu.php');
?>

<!DOCTYPE html>
<html lang='tr'>

<head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <?php include('../../../../bolummeta.php') ?>
    <link rel="canonical" href="https://www.cevirimanga.com/mangalar/<?php echo $adiREPLACE; ?>/bolumler/<?php echo $bolumSayisi; ?>/<?php echo $adiREPLACE; ?>-bolum-<?php echo $bolumSayisi; ?>.php" />
    <link rel='stylesheet' href='../../../../<?php include("cssadi.php"); ?>' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css' integrity='sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==' crossorigin='anonymous' referrerpolicy='no-referrer' />
    <link rel="icon" href="images/title-logo.png" type="image/icon type" />
    <link rel="icon" href="../../../../images/favicon.ico" type="image/x-icon" />
    <!---pwa section start-->
    <link rel="manifest" href="../../../../manifest.json" />
    <script>
        if ('serviceWorker' in navigator) {
          window.addEventListener('load', function () {
            navigator.serviceWorker.register('/service-worker.js?v=1.1.0');
        	});
        }
    </script>
    <!---pwa section end-->
</head>

<body>
    <!--header section start-->
    <?php include('../../../../headerformangabolum.php'); ?>
    <!--header section end-->

    <!--bolumler section start-->
    <?php include('../../../../bolumlerformangalar.php'); ?>
    <!--bolumler section end-->

    <!--bolum adi section start-->
    <div class='bolumadi'>
        <h1><?php echo $adi." Bölüm ".$bolumSayisi; ?></h1>
        <h2><?php echo $bolumAdi; ?></h2>
    </div>
    <!--bolum adi section end-->

    <!--okuma section start-->
    <div class='okuma'>
        <?php include('../../../../okuma.php') ?>
    </div>
    <!--okuma section end-->

    <!--cevirmen adi section start-->
    <div class='cevirmen'>
        <?php
            if($cevirmenAdi != null){
                echo "<p>Çevirmen: ".$cevirmenAdi."</p>"; 
            }
            if($editorAdi != null){
                echo "<p>Editör: ".$editorAdi."</p>"; 
            }
        ?>
    </div>
    <!--cevirmen adi section end-->

    <!--bolumler section start-->
    <?php include('../../../../bolumlerformangalar.php'); ?>
    <!--bolumler section end-->

    <!-- h2 section start -->
    <h2 class='mangah2'><?php echo $adi." Bölüm ".$bolumSayisi; ?> Hakkında Düşünceleriniz Neler?</h2>
    <!-- h2 section end -->

    <!--disqus section start-->
    <div style='margin: 0 7%; margin-top: 2rem;'>
        <?php include('../../../../disqusyorum.php'); ?>
    </div>
    <!--disqus section end-->

    <!--uygulama indir section start-->
    <?php include("../../../../uygulamaindir.php"); ?>
    <!--uygulama indir section end-->

    <!--gecicihaberler section start-->
    <div style="margin-top: 6rem; margin-bottom: -4.5rem;">
        <?php include('../../../../gecicihaberler.php'); ?>
    </div>
    <!--gecicihaberler section end-->

    <!--uptotop section start-->
    <button id="scrollToTopBtn"><i class="fa-solid fa-arrow-up-long"></i></button>
    <script src="../../../../script.js" type="module"></script>
    <!--uptotop section end-->

    <!--footer section start-->
    <?php include('../../../../footer.php'); ?>
    <!--footer section end-->

    <!--cookies section start-->
    <?php include("cookies.php"); ?>
    <!--cookies section end-->

    <?php $baglanti->close(); ?>
    
</body>

</html>