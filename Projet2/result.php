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
$mode=$_POST['mode'];

//echo (' '.$usr.' : '.$pwd.' : '.$mode.'');

if($mode ==1){
   add_utilisateur($usr,$pwd);
}