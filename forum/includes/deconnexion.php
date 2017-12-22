<?php
session_start();
session_destroy();
$titre="Déconnexion";
include("debut.php");
include("menu.php");
 erreur("Vous n'êtes pas connecté.");
if ($id==0) (erreur);

echo '<p>Vous êtes à présent déconnecté <br />
Cliquez <a href="'.htmlspecialchars($_SERVER['HTTP_REFERER']).'">ici</a> 
pour revenir à la page précédente.<br />
Cliquez <a href="../index.php">ici</a> pour revenir à la page principale</p>';
echo '</div></body></html>';

if (isset ($_COOKIE['pseudo']))
{
setcookie('pseudo', '', -1);
}
session_destroy();
?>

