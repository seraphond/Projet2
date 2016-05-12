window.addEventListener("load",dessinerCarte);

var map;
var popupClick = L.popup().setContent("dernier clic");

function dessinerCarte(){ 
    map = L.map('carte');
    //map.on('load',updateBounds);
    //map.on('moveend',updateBounds);
    //map.on('click',updateClick);
    map.setView([45, 3.1416], 5);
    placerMarqueurs(map);
  
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);
}

function updateBounds(ev) {
    var bounds = map.getBounds();
    document.getElementById('latmax').textContent = bounds.getNorth().toFixed(5);
    document.getElementById('latmin').textContent = bounds.getSouth().toFixed(5);
    document.getElementById('lonmax').textContent = bounds.getEast().toFixed(5);
    document.getElementById('lonmin').textContent = bounds.getWest().toFixed(5);

}

function updateClick(ev) {
    document.getElementById('clickaucun').style.display='none';
    document.getElementById('clicklat').textContent = ev.latlng.lat.toFixed(5);
    document.getElementById('clicklon').textContent = ev.latlng.lng.toFixed(5);
    // affichage du popup (option)
    popupClick.setLatLng(ev.latlng);
    popupClick.openOn(map);
}

function placerMarqueurs(map) {
   var l = document.querySelectorAll("div#event"); //liste de toutes les lignes
   for (var i=0; i<l.length; i++){ // pour chaque ligne l[i], insertion d'un marqueur sur la carte 
        // texte du popup.
        var texte = l[i].innerHTML;
        // insertion du marqueur selon les coordonnées trouvées dans les attributs data-lat et data-lon :
        L.marker([l[i].dataset.lat, l[i].dataset.lon]).addTo(map).bindPopup(texte);      
   }
}