// Service Worker - LajuPesan PWA
const CACHE_NAME = 'lajupesan-v1';

// Install event
self.addEventListener('install', (event) => {
  self.skipWaiting();
});

// Activate event
self.addEventListener('activate', (event) => {
  event.waitUntil(clients.claim());
});

// Fetch event - Network only (no offline support)
self.addEventListener('fetch', (event) => {
  event.respondWith(fetch(event.request));
});
