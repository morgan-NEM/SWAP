<?php
session_start();
session_destroy();
$titre="Déconnexion";

           include ('../includes/banner.php');
           include ('../includes/connexion_bdd.php');
           include ('../includes/constants.php');
           include ('../includes/functions.php');
//define('ERR_IS_NOT_CO','Vous ne pouvez pas accéder à cette page si vous n\'êtes pas connecté');
if ($id==0) erreur(ERR_IS_NOT);


echo '<p>Vous êtes à présent déconnecté <br />
Cliquez <a href="../vue/index.php">ici</a> pour revenir à la page principale</p>';
echo '</div></body></html>';

if (isset ($_COOKIE['pseudo']))
{
setcookie('pseudo', '', -1);

}

?>

