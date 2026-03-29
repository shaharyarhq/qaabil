<script>
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/sw.js');
}

let deferredPrompt;

window.addEventListener('beforeinstallprompt', (e) => {
    e.preventDefault();
    deferredPrompt = e;

    window.dispatchEvent(new Event('pwa-install-available'));
});

window.installPWA = async function () {
    if (!deferredPrompt) return;

    deferredPrompt.prompt();
    await deferredPrompt.userChoice;

    deferredPrompt = null;
};
</script>