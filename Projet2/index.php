<?php
/**
 * Created by PhpStorm.
 * User: seraphond
 * Date: 21/04/16
 * Time: 14:01
 */

include'function.php';

echo '<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <meta charset="UTF-8" />
         <link rel="stylesheet" href="style.css" />
    </head>
		<body>';
        form_connect();
echo'<p>Pas encore de compte? Inscrivez-vous grâce à ce bouton!<p>';
echo'<a class="stylebouton" id="inscrip_link" href="inscription.php">S\'inscrire</a>';
echo'</body>
</html>';