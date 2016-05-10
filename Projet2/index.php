<?php
/**
 * Created by PhpStorm.
 * User: seraphond
 * Date: 21/04/16
 * Time: 14:01
 */

include'function.php';
/*
echo '<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <meta charset="UTF-8" />
         <link rel="stylesheet" href="style/style.css" />
    </head>
		<body>';
echo '<div id="connect">'; 
        form_connect();
echo'<p>Pas encore de compte? Inscrivez-vous grâce à ce bouton!<p>';
echo'<a class="stylebouton" id="inscrip_link" href="inscription.php">S\'inscrire</a>';
echo'<a class="stylebouton" id="test" href="test.php">Pantoufle!</a></div></div>';
echo'<div id=carte>';
echo'</body>
</html>';
*/
echo('<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset=\'utf-8\'>
  <title>test acceuil</title>

  <link rel="stylesheet" media="screen" href="../style/style.css"/>
  <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
  <script src="../javascript/scriptCarte.js"></script>
</head>

<body>
<div id="menu">
	<div id="date"><i class="fa fa-clock-o" aria-hidden="true"></i> DATE</div>
	<div id="title">Projet 2</div>
	<div id="user">
		<i class="fa fa-user" aria-hidden="true"></i>
		<div id="connect"> ');
        form_connect();
        echo(' </div>
		
		<a  class="stylebouton" id="inscrip_link" href="inscription.php"><i class="fa fa-user-plus" aria-hidden="true"></i>  Inscription</a>
        <a  class="stylebouton" id="test" href="test.php"><i class="fa fa-user-plus" aria-hidden="true"></i>  Pantoufle!</a>

	</div>
	
</div>
<div id="carte"></div>

<div id="event">
    <p>Yolo de thomas</p><p>date, titre, nom de l\'auteur</p>
		<select>
			<option value="" disabled selected>Ordonner</option>
			<option value="date">Date</option>
			<option value="auteur"><i class="fa fa-users" aria-hidden="true"></i> Auteur</option>
		</select>
</div>

</body>
</html>
');