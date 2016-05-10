<?php
/**
 * Created by PhpStorm.
 * User: seraphond
 * Date: 21/04/16
 * Time: 14:15
 */

include'function.php';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset='utf-8'>
  <title>test acceuil</title>

  <link rel="stylesheet" media="screen" href="style/style.css"/>
  <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
  <script src="javascript/scriptCarte.js"></script>
  <script src="javascript/scriptCo.js"></script>
</head>

<body>
<div id="menu">
	<div id="date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php setlocale (LC_TIME, 'fr_FR.utf8','fra');
        echo (strftime("%A %d %B %Y %R"));?></div>
	<div id="title">Projet 2</div>
	<div id="user">
	<i class="fa fa-user" aria-hidden="true"></i>
		<div id="interact" class="stylebouton">
			<i class="fa fa-sign-in" aria-hidden="true"></i> Connexion
		</div>
		<div id='co'>
			<form>
				<label for="login" >Login :</label><input type="text" name="login" required="requireded"/>
				<label for="mdp"> Mot de passe :</label><input type="password" name="mdp" required="required"/>
				<p></p>
				<button type="submit">Valider</button>
			</form>
		</div>
		<div id="interact" class="stylebouton">
			<a href="">
			<i class="fa fa-user-plus" aria-hidden="true"></i> Inscription
			</a>
		</div>
	</div>
	
</div>


<div id="inscription">
<nav id="form_inscription">
			<h3>Formulaire d'inscription</h3>
            <form id="inscrip" method="POST" action="result.php">
             Utilisateur: <input type="text" name="utilisateur" required="required"></br>
             Mot de passe: <input type="password" name="MDP" required="required"></br></br>
             Description:</br><TEXTAREA name="description" rows=4 cols=40>Entez votre description</TEXTAREA>
            <input type="hidden" name="mode" value="1"/></form></br>
            <button type="submit" class="submit">Creer son compte</button>
            </form>
            </nav>
</div>


</body>
</html>