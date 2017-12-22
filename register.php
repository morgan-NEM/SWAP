<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('includes/banner.php');
          include('includes/connexion_bdd.php');
          include('includes/constants.php')
    ?>
</head>
<body><?php
if ($id!=0) erreur(ERR_IS_CO);

if (empty($_POST['identifiant'])) // Si on la variable est vide, on peut considérer qu'on est sur la page de formulaire
{ ?>
	<h1>Inscription</h1>;
	<form method="post" action="register.php" enctype="multipart/form-data">
	<fieldset><legend>Identifiants</legend>
	<label for="pseudo">* Pseudo :</label>  <input name="pseudo" type="text" id="pseudo" /> (le pseudo doit contenir entre 3 et 15 caractères)<br />
	<label for="password">* Mot de Passe :</label><input type="password" name="password" id="password" /><br />
	<label for="confirm">* Confirmer le mot de passe :</label><input type="password" name="confirm" id="confirm" />
	</fieldset>
	<fieldset><legend>Contacts</legend>
	<label for="email">* Votre adresse Mail :</label><input type="text" name="email" id="email" /><br />
	<label for="facebook">Votre profil Facebook :</label><input type="text" name="facebook" id="facebook" /><br />
	<label for="website">Votre site web :</label><input type="text" name="website" id="website" />
	</fieldset>
	<fieldset><legend>Profil sur le forum</legend>
	<label for="avatar">Choisissez votre avatar :</label><input type="file" name="avatar" id="avatar" />
	<label for="signature">Signature :</label><textarea cols="40" rows="4" placeholder="Votre signature" name="signature" id="signature" ></textarea>
	</fieldset>
	<p>Les champs précédés d un * sont obligatoires</p>
	<label>Se souvenir de moi ?</label><input type="checkbox" name="souvenir" /><br />	
	<p><input type="submit" value="S'inscrire" /></p></form>
	</div>
	</body>
	</html>
	
<?php	
}
else //On est dans le cas traitement
{
$pseudo_erreur1 = NULL;
$pseudo_erreur2 = NULL;
$mdp_erreur = NULL;
$email_erreur1 = NULL;
$email_erreur2 = NULL;
$facebook_erreur = NULL;
$signature_erreur = NULL;
$avatar_erreur = NULL;
$avatar_erreur1 = NULL;
$avatar_erreur2 = NULL;
$avatar_erreur3 = NULL;
	
 //On récupère les variables
 $i = 0;
 $temps = time(); 
 $pseudo=$_POST['pseudo'];
 $signature = $_POST['signature'];
 $email = $_POST['email'];
 $facebook = $_POST['facebook'];
 $website = $_POST['website'];
 $localisation = $_POST['localisation'];
 $pass = md5($_POST['password']);
 $confirm = md5($_POST['confirm']);
 
 //Vérification du pseudo
 $query=$db->prepare('SELECT COUNT(*) AS nbr FROM forum_membres WHERE membre_pseudo =:pseudo');
 $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
 $query->execute();
 $pseudo_free=($query->fetchColumn()==0)?1:0;
 $query->CloseCursor();
 if(!$pseudo_free)
 {
	 $pseudo_erreur1 = "Votre pseudo est déjà utilisé par un membre";
	 $i++;
 }

 if (strlen($pseudo) < 3 || strlen($pseudo) > 15)
 {
	 $pseudo_erreur2 = "Votre pseudo est soit trop grand, soit trop petit";
	 $i++;
 }

 //Vérification du mdp
 if ($pass != $confirm || empty($confirm) || empty($pass))
 {
	 $mdp_erreur = "Votre mot de passe et votre confirmation diffèrent, ou sont vides";
	 $i++;
 }

 //Vérification de l'adresse email

    //Il faut que l'adresse email n'ait jamais été utilisée
    $query=$db->prepare('SELECT COUNT(*) AS nbr FROM forum_membres WHERE membre_email =:mail');
    $query->bindValue(':mail',$email, PDO::PARAM_STR);
    $query->execute();
    $mail_free=($query->fetchColumn()==0)?1:0;
    $query->CloseCursor();
    
    if(!$mail_free)
    {
        $email_erreur1 = "Votre adresse email est déjà utilisée.";
        $i++;
    }
    //On vérifie la forme maintenant
    if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email))
    {
        $email_erreur2 = "Votre adresse E-Mail n'a pas un format correct.";
        $i++;
    }
    //Vérification de la signature
    if (strlen($signature) > 200)
    {
        $signature_erreur = "Votre signature est trop longue";
        $i++;
	}
//inscription OK
if ($i==0)
{
 echo'<h1>Inscription terminée</h1>';
     echo'<p>Bienvenue '.stripslashes(htmlspecialchars($_POST['pseudo'])).' vous êtes maintenant inscrit sur le forum</p>
 <p>Cliquez <a href="\Swappist\forum\index.php">ici</a> pour revenir à la page d accueil</p>';
echo $email. " ";
echo $pseudo." ";
echo $pass." ";
echo $signature;
     
 $nomavatar=(!empty($_FILES['avatar']['size']))?move_avatar($_FILES['avatar']):''; 

     $query=$db->prepare('INSERT INTO forum_membres (membre_pseudo, membre_mdp, membre_email,             
     membre_facebook, membre_siteweb, membre_avatar,
     membre_signature, membre_localisation, membre_inscrit,   
     membre_derniere_visite)
     VALUES (:pseudo, :pass, :email, :facebook, :website, :nomavatar, :signature, :localisation, :temps, :temps)');
 $query->execute(array(
     "pseudo"=>$pseudo,
     "pass"=>$pass,
     "email"=>$email,
     "facebook"=>$facebook,
     "website"=>$website,
     "nomavatar"=>$nomavatar,
     "signature"=>$signature,
     "localisation"=>$localisation,
     "temps"=>$temps,
     "temps"=>$temps
));

 //Et on définit les variables de sessions
     $_SESSION['pseudo'] = $pseudo;
     $_SESSION['id'] = $db->lastInsertId(); ;
     $_SESSION['level'] = 2;
     $query->CloseCursor();
 }
 else
 {
     echo'<h1>Inscription interrompue</h1>';
     echo'<p>Une ou plusieurs erreurs se sont produites pendant l incription</p>';
     echo'<p>'.$i.' erreur(s)</p>';
     echo'<p>'.$pseudo_erreur1.'</p>';
     echo'<p>'.$pseudo_erreur2.'</p>';
     echo'<p>'.$mdp_erreur.'</p>';
     echo'<p>'.$email_erreur1.'</p>';
     echo'<p>'.$email_erreur2.'</p>';
     echo'<p>'.$facebook_erreur.'</p>';
     echo'<p>'.$signature_erreur.'</p>';
     echo'<p>'.$avatar_erreur.'</p>';
     echo'<p>'.$avatar_erreur1.'</p>';
     echo'<p>'.$avatar_erreur2.'</p>';
     echo'<p>'.$avatar_erreur3.'</p>';
    
     echo'<p>Cliquez <a href="./register.php">ici</a> pour recommencer</p>';
 }
}	 


?>
<div>
    <?php include('includes/footer.php');?>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>