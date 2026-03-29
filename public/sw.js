self.addEventListener('install', () => {
    console.log('SW installed');
});

self.addEventListener('fetch', () => {
    // add caching later if needed
});