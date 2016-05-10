window.addEventListener("load",dessinerCarte);

function Station(id, nom, coord)
{
    this.id = id;
    this.nom = nom;
    this.coord = coord;

}

// fonction de mise en place de la carte.
// Suppose qu'il existe dans le document
// un Ã©lÃ©ment possÃ©dant id="cartecampus"
function dessinerCarte(){
    // crÃ©ation de la carte, centrÃ©e sur le point 50.60976, 3.13909, niveau de zoom 16
    // cette carte sera dessinÃ©e dans l'Ã©lÃ©ment HTML "cartecampus"
    var map = L.map('carte').setView([47.60976, 3.13909], 6);

    // ajout du fond de carte OpenStreetMap
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // positionnement d'un marqueur au point 50.609614, 3.136635  avec un popup associÃ©
    //var marker = L.marker([50.609614, 3.136635]).addTo(map)
    //.bindPopup('Le bÃ¢timent M5 <p>Formations en Informatique</p> <button type="button" value="M5">Choisir</button>');

    // positionnement d'un marqueur au point 50.60927, 3.14215  avec un popup associÃ©
    //var marker = L.marker([50.60927, 3.14215]).addTo(map)
    //.bindPopup('LILLIAD <p>(en travaux)</p> <button type="button" value="LILLIAD">Choisir</button>');

    list_marqueurs(map);

    // Mise en place d'une gestionnaire d'Ã©vÃ¨nement : activerBouton se dÃ©clenchera Ã  chaque ouverture de popup
    map.on("popupopen",activerBouton);

    // NB : map.on() est une mÃ©thode propre Ã  la bibliothÃ¨que Leaflet qui permet d'associer des gestionnaires
    // aux Ã©vÃ¨nements concernant la carte.
    map.on("click",afficheCoord);
}

// gestionnaire d'Ã©vÃ¨nement (dÃ©clenchÃ© lors de l'ouverture d'un popup)
// cette fonction va rendre actif le bouton inclus dans le popup en lui assocaint un gestionnaire d'Ã©vÃ¨nement
function activerBouton(ev) {
    var noeudPopup = ev.popup._contentNode; // le noeud DOM qui contient le texte du popup
    var bouton = noeudPopup.querySelector("button"); // le noeud DOM du bouton inclu dans le popup
    bouton.addEventListener("click",boutonActive); // en cas de click, on dÃ©clenche la fonction boutonActive
    bouton.addEventListener("click",changeSelect);
}

// gestionnaire d'Ã©vÃ¨nement (dÃ©clenchÃ© lors d'un click sur le bouton dans un popup)
function boutonActive(ev) {
    // this est ici le noeud DOM de <button>. La valeur associÃ©e au bouton est donc this.value
    alert("Vous avez choisi : " +this.value);
}

function afficheCoord(ev) {
    alert(ev.latlng);
}

function list_marqueurs(map) {
    var stations = document.querySelectorAll("#pick_me");

    for (var i = 0; i < stations.length; i++) {
        var actuelle=stations[i];
        var station=new Station(actuelle.dataset.num, actuelle.dataset.name,[actuelle.dataset.latitude,actuelle.dataset.longitude,actuelle.dataset.altitude]);
        station.ajouter_marqueur(map);


    }

}

Station.prototype.ajouter_marqueur=function(map){
    var marqueur= L.marker([this.coord[0],this.coord[1]]).addTo(map)
        .bindPopup(this.nom+'<p>altitude:'+this.coord[2]+'</p> <button type="button" value="'+this.nom+'">Choisir</button>');

}

function changeSelect(ev){
    var l = document.querySelectorAll("#pick_me");
    var it = 0;
    while(l[it].dataset.name != this.value){
        it++;
    }
    l[it].selected = true;
}