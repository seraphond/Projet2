<?php
/**
 * Created by PhpStorm.
 * User: seraphond
 * Date: 21/04/16
 * Time: 14:01
 */



function print_header(){
    echo('<!DOCTYPE html>
            <html lang="fr">

            <head>
    <meta charset="utf-8">
    <title>Projet 2</title>

    <link rel="stylesheet" media="screen" href="style/style.css"/>
    <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
    <script src="javascript/scriptCarte.js"></script>
    <script src="javascript/scriptCo.js"></script>
    </head>

     <body>');

}






/*Create one event in a div*/
function div_event($tab){
    echo "<div class='event'>";

    echo "<div class='like'><p>{$tab['like']}</p></div>";
    echo "<div class='titre'><h3>{$tab['titre']}</h3></div>";
    echo "<div class='description'><p>{$tab['description']}</p></div>";
    echo "<div class='coord'><p>{$tab['longitude']}</p><p>{$tab['latitude']}</p></div>";

    echo "</div>";
}


function connect(){ //requète Ok.

    try{
        $BDD= new PDO('pgsql:host=localhost;port=5432;dbname=sorgniard;user=sorgniard;password=3562Erw$');
        $BDD->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }catch (Exception $e){
        exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
    }
        return $BDD;

}

function add_utilisateur($user,$pass,$descrip){
    $BDD = connect();
    $requete = $BDD->prepare("INSERT INTO utilisateurs (login,pass,description) VALUES (:login,:pass,:descrip)");
    $requete->bindParam(':login', $user, PDO::PARAM_STR);
    $requete->bindParam(':pass', $pass, PDO::PARAM_STR);
    $requete->bindParam(':descrip', $descrip, PDO::PARAM_STR);
    $requete->execute();
}


    /*INSERT INTO utilisateurs
VALUES('seraphond','truc,'je met des pantoufles sur ton front ');
    */


function check_utilisateur($user,$pass){
    try{

        $BDD=connect();
        $requete=$BDD->prepare("SELECT login FROM utilisateurs WHERE login=:login and pass=:pass");
        $requete->bindParam(':login',$user,PDO::PARAM_STR);
        $requete->bindParam(':pass',$pass,PDO::PARAM_STR);
        $requete->execute();
        $data=$requete->fetch();
        $res=($data==null);
        return $res;

    }catch (Exception $e){
        exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
    }
}

/*
 CREATE TABLE evenement(
latitude float NOT NULL,
longitude float NOT NULL,
titre varchar(40) NOT NULL,
dateevent date NOT NULL,
descrptif varchar(1500),
auteur varchar(50) NOT NULL,
nb_like int,
FOREIGN KEY (auteur) REFERENCES utilisateurs(login),
PRIMARY KEY (latitude,longitude,titre,dateevent)

);
 */

function create_event($longitude,$latitude,$titre,$date,$description,$auteur){
    $like=0;


        $BDD=connect();
        $requete=$BDD->prepare("INSERT INTO evenement (longitude,latitude,titre,dateevent,descriptif,auteur,nb_like) VALUES (:long,:lat,:tit,:dat,:des,:aut,:lik)");
        $requete->bindParam(':long',$longitude,PDO::PARAM_STR);
        $requete->bindParam(':lat',$latitude,PDO::PARAM_STR);
        $requete->bindParam(':tit',$titre,PDO::PARAM_STR);
        $requete->bindParam(':dat',$date,PDO::PARAM_STR);
        $requete->bindParam(':des',$description,PDO::PARAM_STR);
        $requete->bindParam(':aut',$auteur,PDO::PARAM_STR);
        $requete->bindParam(':lik',$like,PDO::PARAM_INT);
        $requete->execute();

/*INSERT INTO evenement  VALUES ('20.00','10.00','bite','20-09-1992','ma bite sur ton front!',0);*/
}

function get_event($lat_min,$long_min,$lat_max,$long_max){
    try{
        $BDD=connect();
        $requete=$BDD->prepare("SELECT * from evenement WHERE latitude>$lat_min and latitude<$lat_max and longitude>$long_min and longitude<$long_max ");
        $requete->execute();
        $data=$requete->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }catch (Exception $e){
        exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
    }
}
/*

 */

function event2html($even){

        echo('<div id="event">
	<div id="titre">
		'.$even['titre'].'
    </div>
	<div id="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> '.$even['nb_like'].'</div>
	<div id="date">'.$even['dateevent'].'</div>
	<div id="longi">Longitude : '.$even['longitude'].'</div>
	<div id="lati">Latitude : '.$even['longitude'].'</div>
	<div id="descr">'.$even['descriptif'].'</div>
</div>');
}

function print_menu(){
    echo ('<div id="menu">
            <div id="date"><i class="fa fa-clock-o" aria-hidden="true"></i> ');
    setlocale (LC_TIME, 'fr_FR.utf8','fra');
    echo (strftime("%A %d %B %Y %R"));
    echo('</div>
            <div id="title">Projet 2</div>
            <div id="index" class="stylebouton">
            <a href="index.php">
            <i class="fa fa-home" aria-hidden="true"></i> Accueil
        </a>
    </div>');
    if($_SESSION['connected'] ==true){
        echo('<div id="create_link" class="stylebouton">
            <a href="event_create.php">
            <i class="fa fa-user-plus" aria-hidden="true"></i> Creer un event
              </a>
    </div>');
    }
          echo('<div id="user">
             <i class="fa fa-user" aria-hidden="true"></i>');
    if ($_SESSION['connected']==true){
        echo('<div id="interact" class="stylebouton">
                    <a href="result.php">
                    <i class="fa fa-sign-in" aria-hidden="true"></i> Déconnexion
                    
                        </a></div>');

    }else{
        echo('<div id="interact" class="stylebouton">
            <i class="fa fa-sign-in" aria-hidden="true"></i> Connexion
        </div>');
    }

    
   echo('<div id="co">
        <form method="POST" action="index.php">
            <label for="login" >Login :</label><input type="text" name="login" required="required"/><br/>
            <label for="mdp"> Mot de passe :</label><input type="password" name="mdp" required="required"/>
            <input type="hidden" name="mode" value="connection"/><br/>
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

        </div>');
}