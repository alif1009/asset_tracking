// posisi Politeknik Negeri Batam
var map = L.map('map').setView([1.1190, 104.0486], 17);

// layer peta
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap'
}).addTo(map);

// marker kampus
var marker = L.marker([1.1190, 104.0486]).addTo(map)
    .bindPopup("<b>Politeknik Negeri Batam</b><br>Lokasi Asset")
    .openPopup();