<?php
    // Mevcut sayfanın URL'sini almak için
    $currentUrl = $_SERVER['REQUEST_URI'];
    $urlParts = explode('/', trim($currentUrl, '/'));

    // Gizlilik politikası bağlantısını ayarla
    $privacyPolicyLink = 'gizlilik.php'; // Varsayılan bağlantı

    // Geri gitmek için gerekli olan dizin sayısını hesapla
    $backtrackCount = count($urlParts) - 1; // Son eleman sayfa adı, geri gitmek için 1 çıkar

    // Gizlilik politikası bağlantısını oluştur
    $privacyPolicyLink = str_repeat('../', $backtrackCount) . 'gizlilik.php';
?>

<footer style="margin-top: 10rem;">
    <div style="padding-top: 1rem;">
        <p style="margin: 0.5rem; font-size: 1.6rem; font-weight: 200;">Hakkımızda</p>
        <p>Çeviri Manga, manga kültürüne olan sevgisiyle bilinen bir çeviri topluluğudur.</p>
    </div>
    <div style="padding-top: 1rem;">
        <p style="margin: 0.5rem; font-size: 1.6rem; font-weight: 200;">Bilgilendirme</p>
        <p>Çeviri Manga'da bulunan bütün içerikler test amaçlı geliştirilmiştir ve gönüllü insanların çalışmalarının bir sonucudur.</p>
        <p>Bu çalışmalar üzerinden ticari bir kaygı güdülmez.</p>
        <p>Web site proje geliştirmek amacıyla ortaya çıkmıştır ve eserlerin tam halleri değil, tanıtım amaçlı yalnızca 1-2 sayfaları sergilenmektedir.</p>
    </div>
    <div style="padding: 1rem 0 1.8rem 0;">
        <p style="margin: 0.5rem; font-size: 1.6rem; font-weight: 200;">Sayfalar</p>
        <div style="display:flex; justify-content: center;">
            <div class="btn" style="margin: 1rem 1rem 0 1rem; background-color: var(--third-color);">
                <a href="<?php echo $privacyPolicyLink; ?>" style="color: var(--second-color);">Gizlilik Politikası</a>
            </div>
        </div>
    </div>
</footer>