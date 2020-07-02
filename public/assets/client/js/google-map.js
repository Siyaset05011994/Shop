
//Leaflet google map
var cities = L.layerGroup();

L.marker([40.717192,-74.012042]).bindPopup('<div class="listing-window-image-wrapper"><a href="location-category.html"><div class="listing-window-image" style="background-image: url(assets/images/home/gallery1.jpg);"></div><div class="listing-window-content"><div class="info"><h2>Real House Luxury Villa</h2><p>Est St, 77 - Central Park South, NYC</p><h3>$ 230,000</h3></div></div></a></div>').addTo(cities),





    L.marker([40.717192,-74.012042]).bindPopup('<div class="listing-window-image-wrapper"><a href="location-category.html"><div class="listing-window-image" style="background-image: url(assets/images/home/gallery4.jpg);"></div><div class="listing-window-content"><div class="info"><h2>Real House Luxury Villa</h2><p>Est St, 77 - Central Park South, NYC</p><h3>$ 230,000</h3></div></div></a></div>').addTo(cities),
 
 


    L.marker([40.717192,-74.012042]).bindPopup('<div class="listing-window-image-wrapper"><a href="location-category.html"><div class="listing-window-image" style="background-image: url(assets/images/home/gallery4.jpg);"></div><div class="listing-window-content"><div class="info"><h2>Real House Luxury Villa</h2><p>Est St, 77 - Central Park South, NYC</p><h3>$ 230,000</h3></div></div></a></div>').addTo(cities);



var mbAttr = '	' +
    ' ' +
    '',
    mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

var grayscale = L.tileLayer(mbUrl, {
        id: 'mapbox.light',
        attribution: mbAttr
    }),
    streets = L.tileLayer(mbUrl, {
        id: 'mapbox.streets',
        attribution: mbAttr
    });

var map = L.map('map', {
    center: [40.717192,-74.012042],
    zoom: 10,
    layers: [streets, cities]
});

var baseLayers = {
    "Grayscale": grayscale,
    "Streets": streets
};

var overlays = {
    "Cities": cities
};

map.scrollWheelZoom.disable()
L.control.layers(baseLayers, overlays).addTo(map);
