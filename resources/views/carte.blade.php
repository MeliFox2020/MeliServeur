<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- Nous chargeons les fichiers CDN de Leaflet. Le CSS AVANT le JS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
        <style type="text/css">
            #map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
                height:800px;
                z-index: 50;
            }
        </style>
        <title>Carte</title>
    </head>
    <body>
        <div id="map">
	    <!-- Ici s'affichera la carte -->
	</div>

        <!-- Fichiers Javascript -->
        <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
	<script type="text/javascript">
            // On initialise la latitude et la longitude de Talence (centre de la carte)
            var lat = 44.8020563;
            var lon = -0.5994535;
            var macarte = null;
            // Fonction d'initialisation de la carte
            function initMap() {
                // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
                macarte = L.map('map').setView([lat, lon], 11);
                // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
                L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                    // Il est toujours bien de laisser le lien vers la source des données
                    attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                    minZoom: 1,
                    maxZoom: 20
                }).addTo(macarte);
                var marker = L.marker([lat, lon]).addTo(macarte);
                marker.bindPopup("<b>Toit Kastler</b><br>Rucher du toit kastler");
                /*var polygon = L.polygon([
                    [44.801, -0.603],
                    [44.802, -0.605],
                    [44.800, -0.604]
                ]).addTo(macarte);*/
            }
            window.onload = function(){
		// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
		initMap();
            };
        </script>
        {{-- <style>
            * {
            box-sizing: border-box;
            }
            body {
            font-family: Roboto, Helvetica, sans-serif;
            }
            /* Fixez le bouton sur le côté gauche de la page the button on the left side of the page */
            .open-btn {
            display: flex;
            justify-content: left;
            }
            /* Stylez et fixez le bouton sur la page */
            .open-button {
            background-color: #1c87c9;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            }
            /* Positionnez la forme Popup */
            .login-popup {
            position: relative;
            text-align: center;
            width: 100%;
            }
            /* Masquez la forme Popup */
            .form-popup {
            display: none;
            position: fixed;
            left: 45%;
            top:5%;
            transform: translate(-45%,5%);
            border: 2px solid #666;
            z-index: 95;
            }
            /* Styles pour le conteneur de la forme */
            .form-container {
            max-width: 300px;
            padding: 20px;
            background-color: #fff;
            }
            /* Largeur complète pour les champs de saisie */
            .form-container input[type=text], .form-container input[type=password] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 22px 0;
            border: none;
            background: #eee;
            }
            /* Quand les entrées sont concentrées, faites quelque chose */
            .form-container input[type=text]:focus, .form-container input[type=password]:focus {
            background-color: #ddd;
            outline: none;
            }
            /* Stylez le bouton de connexion */
            .form-container .btn {
            background-color: #8ebf42;
            color: #fff;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom:10px;
            opacity: 0.8;
            }
            /* Stylez le bouton pour annuler */
            .form-container .cancel {
            background-color: #cc0000;
            }
            /* Planez les effets pour les boutons */
            .form-container .btn:hover, .open-button:hover {
            opacity: 1;
            }
          </style>
          <div class="open-btn">
            <button class="open-button" onclick="openForm()"><strong>Placer un nouveau rucher</strong></button>
          </div>
          <div class="position-popup">
            <div class="form-popup" id="popupForm">
              <form action="insertRucher" method="post">
                {{ csrf_field() }}
                <h2>Entrer les caractéristiques du Rucher</h2>
                <label for="nom">
                <strong>Nom</strong>
                </label>
                <input type="text" id="nom" placeholder="Entrer un nom" name="nom" required>
                <label for="lon">
                <strong>Longitude</strong>
                </label>
                <input type="text" id="longitude" placeholder="Entrer la longitude" name="lon" required>
                <label for="lat">
                    <strong>Lattitude</strong>
                    </label>
                    <input type="text" id="lattitude" placeholder="Entrer la lattitude" name="lat" required>
                <button type="submit" class="btn">Confirmer</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
              </form>
            </div>
          </div>
          <script>
            function openForm() {
              document.getElementById("popupForm").style.display="block";
            }

            function closeForm() {
              document.getElementById("popupForm").style.display="none";
            }
          </script>*/ --}}
    </body>
</html>
