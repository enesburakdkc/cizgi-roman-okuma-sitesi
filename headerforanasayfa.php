<?php
    //Her sayfada session yok edilsin ki admin girişi her seferinde tekrar yapılmak zorunda kalınsın.
    session_start();
    session_destroy();
?>

<div class="containerheader">
  <div class="nav1">
    <a href="../"><img src="images/logo.png" alt="logo" /></a>
  </div>
  <nav>
    <div class="navanasayfaanasayfa">
      <div class="navtext">
        <a href="../">
          <i class="fa-solid fa-house" style="padding-right: 1rem;"></i>
          <k>Ana Sayfa</k>
        </a>
      </div>
    </div>
    <div class="nav2">
      <div class="navtext">
        <a href="#populerseriler">Popüler Seriler</a>
      </div>
      <div class="navtext"><a href="#yenibolumler">Yeni Bölümler</a></div>
      <div class="navtext"><a href="#kategoriler">Kategoriler</a></div>
    </div>
    <div class="navtema">
      <div class="navtext" id="themetext">
        <k>Tema</k>
        <i class="fa-regular fa-sun" style="padding-left: 1rem;" id="theme"></i>
      </div>
    </div>
  </nav>
</div>