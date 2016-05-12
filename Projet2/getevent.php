<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/05/16
 * Time: 16:57
 */

header('Content-type: application/json');
include ('function.php');
$reponse=[];

if(isset($_Get['id'])){
    try{
        $BDD=connect();
    }catch (PDOException $e){
        $reponse["status"]="error";
        $reponse["results"]=array("message"=> $e->getMessage());
    }


}