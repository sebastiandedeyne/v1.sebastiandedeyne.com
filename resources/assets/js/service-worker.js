// Based on the following resources:
// - https://css-tricks.com/serviceworker-for-offline
// - https://gist.github.com/vanbrabantf/76586a7d069d0e42922123c4046c1286

const version = 'v1$';

const offlineFundamentals = [
    '',
    '/',
    '/about',
    '/open-source',
    '/css/site.css',
    '/js/site.js',
];

const offlinePage = `
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            
            <link rel="stylesheet" type="text/css" href="/css/site.css">
            <script src="/js/site.js" defer></script>
        </head>
        <body>
            <section class="error">
                <h1 class="error__title">
                    You've left the information superhighway
                </h1>
                <p class="error__message">
                    Luckily some pages are available offline.
                </p>
                <a href="/" class="button">Home</a>
                <a href="/about" class="button">About</a>
                <a href="/open-source" class="button">Open Source</a>
            </section>
        </body>
    </html>
`;

const noop = () => {};

self.addEventListener('install', event => {
    event.waitUntil(hydrateCacheWithOfflineFundamentals);
});

self.addEventListener('activate', event => {
    event.waitUntil(clearCachedItemsFromPreviousVersion);
});

self.addEventListener('fetch', event => {
    if (event.request.method === 'GET') {
        event.respondWith(
            resolveRequest(event.request)
        );
    }
 });

const clearCachedItemsFromPreviousVersion = () =>
    caches.keys()
        .then(keys => 
            Promise.all(
                keys.filter(key => ! key.startsWith(version))
                    .map(key => caches.delete(key))
            ).then(noop)
        );

const hydrateCacheWithOfflineFundamentals = () =>
    caches.open(version + 'fundamentals')
        .then(cache => cache.addAll(offlineFundamentals))
        .then(noop);

const resolveRequest = request =>
    caches.match(request).then(cached => {
        const networked = fetch(request)
            .then(resolveNetworkResponse(request), unableToResolve)
            .catch(unableToResolve);

        return cached || networked;
    });

const resolveNetworkResponse = request => response => {
    const fetched = response.clone();

    caches.open(version + 'pages')
        .then(cache => cache.put(request, fetched))
        .then(noop);
    
    return response;
};

const unableToResolve = () =>
    new Response(offlinePage, {
        status: 503,
        statusText: 'Service Unavailable',
        headers: new Headers({
            'Content-Type': 'text/html'
        })
    });
