<?php
   include ('function.php');

$usr=$_POST['login'];
$pwd=$_POST['mdp'];
$mode=$_POST['mode'];
$descip=$_POST['description'];

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
}
    

print_header();
print_menu();

?>
<div id="carte"></div>

<div id="event">
    <p>Yolo de thomas</p><p>date, titre, nom de l\'auteur</p>
    <select>
        <option value="" disabled selected>Ordonner</option>
        <option value="date">Date</option>
        <option value="auteur"><i class="fa fa-users" aria-hidden="true"></i> Auteur</option>
    </select>
</div>

<pre>Post :<?php print_r($_POST);?></pre>
<pre>Session:<?php print_r($_SESSION);?></pre>
<!---<pre><?php print_r($verif);?></pre> --->
<?php echo($message);?>
</body>

</html>