<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/05/16
 * Time: 12:58
 */

session_start();
include ('function.php');

if ($_SESSION['connected']==true){

    print_header();
    print_menu();


echo('<div id="inscription">
    <nav id="form_inscription">
        <h3>Création d\' événements</h3>
        <form id="inscrip" method="POST" action="index.php">
            Longitude : <input type="text" name="longitude" required="required"><br/>
            Latitude : <input type="text" name="latitude" required="required"><br/><br/>
            Titre : <input type="text" name="titre" required="required"><br/>
            Date : <input type="text" name="date" required="required"><br/>
            Description:<br/><TEXTAREA name="description" rows=4 cols=40>Entez votre description</TEXTAREA>
            <input type="hidden" name="mode" value="creation"/><br/>
            <input type="hidden" name="login" value="'.$_SESSION['login'].'"/><br/>
            <button type="submit" class="submit">Creer son event!</button>
        </form>
    </nav>
</div>');

}else{
    header("Location: index.php");
}


