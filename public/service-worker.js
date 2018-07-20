
const staticAssets = [
  './app.js',
  './assets/images/action-for-singapore-dogs-logo.png'
];

self.addEventListener('install', async event => {
  const cache = await caches.open("asd-static");
  cache.addAll(staticAssets);
  //console.log("sw install");
});

self.addEventListener('fetch', event => {
  const request = event.request;
  const url = new URL(request.url);
  
  if (url.origin === location.origin) { //fetch from own site
    event.respondWith(cacheFirst(request));
  } else {
    event.respondWith(networkFirst(request));
  }
  //console.log("sw fetch");
});

async function cacheFirst(request) {
  //caches' key is request
  const cachedResponse = await caches.match(request);
  //if undefined, use network
  return cachedResponse || fetch(request);
}

async function networkFirst(request) {
  const cache = await caches.open("asd-dynamic");
  try {
    const result = await fetch(request);
    cache.put(request, result.clone());
    return result;
  } catch (error) { //offline
    const cachedResponse = await cache.match(request);
    return cachedResponse || await caches.match("/fallback.json");
  }
}