<?php
/**
 * Created by PhpStorm.
 * User: seraphond
 * Date: 21/04/16
 * Time: 14:01
 */


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
    echo'<nav id="form_inscription"></nav>
            <form id="inscrip" method="POST" action="result.php">
             Utilisateur: <input type="text" name="utilisateur" required="required"><br>
             Mot de passe: <input type="password" name="MDP" required="required"><br>
            <input type="hidden" name="mode" value="1"/>
             <input type="submit" value="Créer son compte">
            </form>
            </nav>';
    

}


function connect(){

    try{
        $BDD= new PDO('pgsql:host=localhost;port=5432;dbname=sorgniard;user=sorgniard;password=3562Erw$');
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );
    }catch (Exception $e){
        exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
    }
        return $BDD;

}

function add_utilisateur($user,$pass){
    $BDD=connect();
    try{
        $requete=$BDD->prepare("INSERT INTO utilisateurs (login,pass) VALUES (:login,:pass)");
        $requete->bindParam(':login',$user,PDO::PARAM_STR);
        $requete->bindParam(':pass',$pass,PDO::PARAM_STR);
        $requete->execute();
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );
    }catch (Exception $e){
        exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
        
    }


}
/*
function check_utilisateur($user,$pass){
    try{
        $requete=$BDD->prepare('')
    }catch (Exception $e){

    }
}*/
