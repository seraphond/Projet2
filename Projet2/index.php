<?php
   include ('function.php');

$usr=$_POST['login'];
$pwd=$_POST['mdp'];
$mode=$_POST['mode'];
$descip=$_POST['description'];
$longitude=$_POST['longitude'];
$latitude=$_POST['latitude'];
$titre=$_POST['titre'];
$date=$_POST['date'];

if($mode =="inscription") {
    try {
        add_utilisateur($usr, $pwd, $descip);
    } catch (Exception $e) {
        $message="Login déjà présent";
    }
}elseif ($mode=="connection"){
    $verif=check_utilisateur($usr,$pwd);
    if($verif==1){
        $message="Utilisateur inconnu ou mot de passe incorrect";
    }
    if($verif==0){
        session_start();
        $_SESSION['connected']=true;
        $_SESSION['login']=$usr;
        $message="Bienvenue ".$usr." .";
    }
}elseif ($mode=="creation"){
    try{
        create_event($longitude,$latitude,$titre,$date,$descip,$usr);
        $message="l'évenement est bien creé";
    } catch (Exception $e) {
        $message="l'évenement existe déjà";
    }
}
    

print_header();
print_menu();

?>
<div id="main">
<div id="carte"></div>

<div id="events">
   <!--<p>Yolo de thomas</p><p>date, titre, nom de l\'auteur</p>-->
    <select>
        <option value="" disabled selected>Ordonner</option>
        <option value="date">Date</option>
        <option value="auteur"><!--<i class="fa fa-users" aria-hidden="true"></i>--> Auteur</option>
    </select>
    <div id="event">
        <div id="titre">Le titre</div>
        <div id="like">95</div>
        <div id="date">24/05/2018</div>
        <div id="longi">24.5</div>
        <div id="lati">56.8</div>
        <div id="descr">Je suis une description de ouf !</div>
    </div>
    <div id="event">
        <div id="titre">Le titre</div>
        <div id="like">95</div>
        <div id="date">24/05/2018</div>
        <div id="longi">5546468.5</div>
        <div id="lati">56.8</div>
        <div id="descr">Je suis une description de ouf !</div>
    </div>
</div>
</div>
<?php
/*
<pre>Post :<?php print_r($_POST);?></pre>
<pre>Session:<?php print_r($_SESSION);?></pre>
<!---<pre><?php print_r($verif);?></pre> --->


*/

?>
</body>
<?php echo('<p>'.$message.'</p>');?>
</html>