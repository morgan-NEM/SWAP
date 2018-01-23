<?php
session_start();
session_destroy();
$titre="Déconnexion";
// include("menu.php");
//define('ERR_IS_NOT_CO','Vous ne pouvez pas accéder à cette page si vous n\'êtes pas connecté');
if ($id==0) erreur(ERR_IS_NOT_CO);


echo '<p>Vous êtes à présent déconnecté <br />
Cliquez <a href="'.htmlspecialchars($_SERVER['HTTP_REFERER']).'">ici</a> 
pour revenir à la page précédente.<br />
Cliquez <a href="../vue/index.php">ici</a> pour revenir à la page principale</p>';
echo '</div></body></html>';

if (isset ($_COOKIE['pseudo']))
{
setcookie('pseudo', '', -1);

}

?>

