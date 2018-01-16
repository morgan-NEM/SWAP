<?php 
define('ERR_IS_CO','Vous ne pouvez pas accéder à cette page si vous n\'êtes pas connecté');
define('ERR_IS_NOT_CO', 'Vous êtes déjà membre vous n\'avez rien à faire ici!');
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;?>
