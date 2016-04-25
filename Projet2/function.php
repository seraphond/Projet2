<?php
/**
 * Created by PhpStorm.
 * User: seraphond
 * Date: 21/04/16
 * Time: 14:01
 */

session_start();

function form_connect(){

    echo'<nav id="form_connect">
            <form id="connect" method="POST">
             Utilisateur: <input type="text" name="utilisateur" required="required"><br>
             Mot de passe: <input type="password" name="MDP" required="required"><br>
            <input type="hidden" name="mode" value="0"/>
             <input type="submit" value="Se connecter">
            </form>
            </nav>';
}

function form_inscription(){
    echo'<nav id="form_inscription">
            <form id="inscrip" method="POST" action="result.php">
             Utilisateur: <input type="text" name="utilisateur" required="required"><br>
             Mot de passe: <input type="password" name="MDP" required="required"><br>
             Description:<TEXTAREA name="description" rows=4 cols=40>Entez votre descrption</TEXTAREA>
            <input type="hidden" name="mode" value="1"/>
             <input type="submit" value="Créer son compte">
            </form>
            </nav>';
    

}


function connect(){ //requète Ok.

    try{
        $BDD= new PDO('pgsql:host=localhost;port=5432;dbname=sorgniard;user=sorgniard;password=3562Erw$');
        $BDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    }catch (Exception $e){
        exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
    }
        return $BDD;

}

function add_utilisateur($user,$pass,$descrip){
    $BDD=connect();
    try{
        $requete=$BDD->prepare("INSERT INTO utilisateurs (login,pass,description) VALUES (:login,:pass,:descrip)");
        $requete->bindParam(':login',$user,PDO::PARAM_STR);
        $requete->bindParam(':pass',$pass,PDO::PARAM_STR);
        $requete->bindParam(':descrip',$descrip,PDO::PARAM_STR);
        $requete->execute();

    }catch (Exception $e){
        exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
        
    }


    /*INSERT INTO utilisateurs
VALUES('seraphond','truc,'je met des pantoufles sur ton front ');
    */
}

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
nb_like int,
PRIMARY KEY (latitude,longitude,titre,dateevent)

);
 */