<?php
/**
 * Created by PhpStorm.
 * User: seraphond
 * Date: 21/04/16
 * Time: 14:15
 */

include'function.php';


print_header();
print_menu(); ?>


<div id="inscription">
<nav id="form_inscription">
			<h3>Formulaire d'inscription</h3>
            <form id="inscrip" method="POST" action="index.php">
             Utilisateur: <input type="text" name="login" required="required"><br/>
             Mot de passe: <input type="password" name="mdp" required="required"><br/><br/>
             Description:<br/><TEXTAREA name="description" rows=4 cols=40>Entez votre description</TEXTAREA>
            <input type="hidden" name="mode" value="inscription"/><br/>
            <button type="submit" class="submit">Creer son compte</button>
            </form>
            </nav>
</div>


</body>
</html>