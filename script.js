//Tema değiştirme
var themetext = document.getElementById("themetext");
  themetext.onclick = function(){
    document.body.classList.toggle("light-theme");
    if(document.body.classList.contains("light-theme")){
      theme.classList = "fa-regular fa-moon";
    }
    else{
      theme.classList = "fa-regular fa-sun";
    }
  }

//Ekranı kaydırınca yukarı çıkaran buton
document.addEventListener("DOMContentLoaded", function () {
  var scrollToTopBtn = document.getElementById("scrollToTopBtn");

  window.addEventListener("scroll", function () {
    // Sayfa aşağı kaydıkça butonu göster/gizle
    if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 250) {
      scrollToTopBtn.classList.add("show");
    } else {
      scrollToTopBtn.classList.remove("show");
    }
  });

  // Butona tıklandığında sayfayı en üstüne kaydır
  scrollToTopBtn.addEventListener("click", function () {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  });
});
