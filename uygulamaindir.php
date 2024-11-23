<div id="install-app" style="display: none; margin-top: 6rem;">
  <p style="color: var(--second-color); margin: 2rem 1rem; text-align: center; font-size: 1.45rem;">Uygulamamızı İndirmek İçin Tıkla!</p>
  <div style="display:flex; justify-content: center;">
      <div class="btn"><a id="install-a" style="color: var(--second-color); padding: 0.5rem;"><i class="fa-solid fa-download" style="margin-right: 0.5rem;"></i> TIKLA</a></div>
  </div>
</div>
<script>
  const installDiv = document.getElementById('install-app');
  const installA = document.getElementById('install-a');
  let beforeInstallPromptEvent
  window.addEventListener("beforeinstallprompt", function(e) {
      e.preventDefault();
      beforeInstallPromptEvent = e
      installDiv.style.display = 'block'
      installA.addEventListener("click", function() {
          e.prompt();
      });
      installA.hidden = false;
  });
  installA.addEventListener("click", function() {
      beforeInstallPromptEvent.prompt();
  });
</script>