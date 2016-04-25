<?php
/**
 * Created by PhpStorm.
 * User: seraphond
 * Date: 21/04/16
 * Time: 15:49
 */

include 'function.php';


$usr=$_POST['utilisateur'];
$pwd=$_POST['MDP'];
$descip=$_POST['description'];
$mode=$_POST['mode'];

//echo (' '.$usr.' : '.$pwd.' : '.$mode.'');

if($mode ==1){
   add_utilisateur($usr,$pwd,$descip);
}elseif ($mode==0){
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