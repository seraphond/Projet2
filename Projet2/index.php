<?php
   include ('function.php');

$usr=$_POST['utilisateur'];
$pwd=$_POST['MDP'];
$mode=$_POST['mode'];
$descip=$_POST['description'];
    /*
    if ($mode ==1){
        $verif=check_utilisateur($usr,$pwd);
        if($verif==1){
            echo'Utilisateur inconnu où mot de passe incorrect';
        }
        if($verif==0){
            $_SESSION['connected']=true;
            $_SESSION['login']=$usr;
            echo 'Bienvenue '.$usr.' .';
        }
    }

*/
    
?><!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>test acceuil</title>

    <link rel="stylesheet" media="screen" href="style/style.css"/>
    <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
    <script src="javascript/scriptCarte.js"></script>
    <script src="javascript/scriptCo.js"></script>
</head>

<body>
<div id="menu">
    <div id="date"><i class="fa fa-clock-o" aria-hidden="true"></i><?php setlocale (LC_TIME, 'fr_FR.utf8','fra');
        echo (strftime("%A %d %B %Y %R"));?></div>
    <div id="title">Projet 2</div>
    <div id="user">
        <i class="fa fa-user" aria-hidden="true"></i>
        <div id="interact" class="stylebouton">
            <i class="fa fa-sign-in" aria-hidden="true"></i> Connexion
        </div>
        <div id="co">
            <form method="POST" action="index.php">
                <label for="login" >Login :</label><input type="text" name="login" required="required"/>
                <label for="mdp"> Mot de passe :</label><input type="password" name="mdp" required="required"/>
                <input type="hidden" name="mode" value="1"/></form></br>
                <p></p>
                <button type="submit">Valider</button>
            </form>
        </div>
        <div id="interact" class="stylebouton">
            <a href="inscription.php">
                <i class="fa fa-user-plus" aria-hidden="true"></i> Inscription
            </a>
        </div>
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
<pre><?php print_r($_POST);?></pre>
</body>

</html>