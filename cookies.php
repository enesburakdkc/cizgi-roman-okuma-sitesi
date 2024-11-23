<div name="cookiesContainer" id="cookiesContainer"></div>

<script>
    // Mevcut sayfanın URL'sini almak için
    const currentUrl = window.location.pathname; // URL'yi al
    const urlParts = currentUrl.split('/').filter(part => part); // URL'yi '/' ile böl ve boş elemanları filtrele
    // Gizlilik politikası bağlantısını ayarla
    let privacyPolicyLink = 'gizlilik.php'; // Varsayılan bağlantı
    // Geri gitmek için gerekli olan dizin sayısını hesapla
    const backtrackCount = urlParts.length > 1 ? urlParts.length - 1 : 0; // Eğer URL'de birden fazla parça varsa geri git
    // Gizlilik politikası bağlantısını oluştur
    privacyPolicyLink = '../'.repeat(backtrackCount) + 'gizlilik.php';

    var cookiesBox =
    "<div class='cookies' name='cookies' id='cookies'>"+
        "<p style='text-align: center;'>Sitemiz size daha iyi hizmet sunabilmek için çerezleri kullanır. Sitemizi kullanmaya devam ederek çerezleri kullanmaya izin vermiş olursunuz.</p>"+
        "<div style='display:flex; justify-content:space-evenly; margin-top:1rem;'>"+
            "<a href='" + privacyPolicyLink + "' class='btn' style='color: var(--second-color);'>Çerezler Politikamız</a>"+
            "<a class='btn' style='color: var(--second-color);' onclick='acceptCookies()'>Kabul Ediyorum</a>"+
        "</div>"+
    "</div>";

    // Çerez kabul ekranını göstermek/gizlemek için fonksiyon
    function checkCookieConsent() {
    let consent = getCookie("cookiesKabul");
        if (consent == "true") {
            // Çerez kabul ekranını gösterme
        } else {
            // Çerez kabul ekranını göster
            document.getElementById("cookiesContainer").innerHTML = cookiesBox;
        }
    }

    // Çerez değerini okumak için fonksiyon
    function getCookie(name) {
        let matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
    
    // Çerez ayarlamak için fonksiyon
    function setCookie(name, value, days) {
        let expires = "";
        if (days) {
            let date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }
    
    // Kullanıcı çerezleri kabul ettiğinde çağrılacak fonksiyon
    function acceptCookies() {
        setCookie("cookiesKabul", "true", 30); // 1 ay için çerez ayarla
        document.getElementById("cookiesContainer").innerHTML = ''; // Çerez kabul mesajını gizle
        checkCookieConsent(); // Çerez kabul durumunu kontrol et ve uyarı ekranını güncelle
    }
    
    // Sayfa yüklendiğinde çerez kabul durumunu kontrol et
    document.addEventListener("DOMContentLoaded", function() {
        checkCookieConsent();
    });
</script>