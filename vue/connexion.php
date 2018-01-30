<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../includes/styles/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../includes/styles/style.css">
    <link rel="stylesheet" type="text/css" href="../includes/styles/footer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swapp - Connexion</title>
</head>
<body>
<div><?php include ('../includes/banner.php');
           include ('../includes/connexion_bdd.php');
           include ('../includes/constants.php');
           include ('../includes/functions.php') ?> </div>

<h1 class="centrer">Connexion</h1>

<?php 
if ($id!=0) erreur(ERR_IS_CO);

if (!isset($_POST['identifiant'])) //On est dans la page de formulaire
{?>
<form method="post" action="connexion.php">

            <p class="centrer"><input type="text" name="identifiant" placeholder="Identifiant"></p>
            <p class="centrer"><input type="password" name="password" placeholder="Mot de passe"></p>
            <p class="centrer"><input type="submit"></p>
            <p class="centrer"><a href="./register.php">Pas encore inscrit ?</a></p>

</form>

<?php

} else {
    $message = '';
    if (empty($_POST['identifiant']) || empty($_POST['password'])) // Si un champ a été oublié
    {
        $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
    } else //On vérifie le mot de passe
    {
        $query = $db->prepare('SELECT mdp, ID, pseudo
        FROM utilisateurs WHERE pseudo = :pseudo');
        $query->bindValue(':pseudo', $_POST['identifiant'], PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch();
        if ($data['mdp'] == md5($_POST['password'])) // Accès OK !
        {
            //session_start();
            $_SESSION['pseudo'] = $data['pseudo'];        
            $_SESSION['ID'] = $data['ID'];
            $message = '<p>Bienvenue ' . $data['pseudo'] . ',
			vous êtes maintenant connecté!</p>
			<p>Cliquez <a href="../vue/index.php">ici</a>
			pour revenir à la page d accueil</p>';
        } else // Accès pas OK !
        {
            $message = '<p>Une erreur s\'est produite
	    pendant votre identification.<br /> Le mot de passe ou le pseudo
            entré n\'est pas correct.</p><p>Cliquez <a href="connexion.php">ici</a>
        pour revenir à la page précédente';
	    
        }
        $query->CloseCursor();
    }
    echo $message . '</div></body></html>';

}
?>
<input type="hidden" name="page" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
<?php
// //$page = htmlspecialchars($_POST['page']);
// echo 'Cliquez <a href="'.$page.'">ici</a> pour revenir à la page précédente';
if (isset($_POST['souvenir'])) {
    $expire = time() + 365 * 24 * 3600;
    setcookie('pseudo', $_SESSION['pseudo'], $expire);
}
?>
<div><?php include ("../includes/footer.php");?></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>