<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../includes/styles/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../includes/styles/style.css">
    <link rel="stylesheet" type="text/css" href="../includes/styles/footer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include('../includes/banner.php');
    include('../includes/connexion_bdd.php');
    
    if (isset($_POST["sent"])) {
        $erreur="";
        $prix=$_POST["sous"];
        if(1>$prix ||$prix>1000){
                $erreur .= "Votre prix n'est pas correct";
        }

        if (!empty($_FILES['avatar']['size']))
        {
        $erreur=0;
        $avatar_erreur = NULL;
        $avatar_erreur1 = NULL;
        $avatar_erreur2 = NULL;
        $avatar_erreur3 = NULL;
            $maxsize = 10000000; //Poid de l'image
            $maxwidth = 500; //Largeur de l'image
            $maxheight = 500; //Longueur de l'image
            $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'bmp' );

            if ($_FILES['img_objet']['error'] > 0)
            {
            $avatar_erreur = "Erreur lors du tranfsert de l'avatar : ";
            }
            if ($_FILES['img_objet']['size'] > $maxsize)
            {
            $erreur++;
            $avatar_erreur1 = "Le fichier est trop gros :
            (<strong>".$_FILES['img_objet']['size']." Octets</strong>
            contre <strong>".$maxsize." Octets</strong>)";
            }
     
            $image_sizes = getimagesize($_FILES['img_objet']['tmp_name']);
            if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
            {
            $erreur++;
            $avatar_erreur2 = "Image trop large ou trop longue :
            (<strong>".$image_sizes[0]."x".$image_sizes[1]."</strong> contre
            <strong>".$maxwidth."x".$maxheight."</strong>)";
            }
     
            $extension_upload = strtolower(substr(  strrchr($_FILES['img_objet']['name'], '.')  ,1));
            if (!in_array($extension_upload,$extensions_valides) )
            {
                    $erreur++;
                    $avatar_erreur3 = "Extension de l'avatar incorrecte";
            }
        }
        if ($erreur!=0){
            $nomobjet=move_avatar($_FILES['img_objet']);
                    $query=$db->prepare('UPDATE forum_membres
                    SET membre_avatar = :avatar 
                    WHERE membre_id = :id');
                    $query->bindValue(':avatar',$nomavatar,PDO::PARAM_STR);
                    $query->bindValue(':id',$id,PDO::PARAM_INT);
                    $query->execute();
                    $query->CloseCursor();
        }
            



    }
    ?>
    <h1>Ajouter votre article</h1>
    <form method= "post">
    <input type="text" placeholder="Nom de l'article"><br/>
    <textarea cols="40" row="4" name="description" placeholder="Description de l'article"></textarea><br />
    Sélectionnez une image: <input type="file" name="img_objet" id="img_objet"><br />
    Prix demandé (en SouApp): <input type="text" name=sous > <br />
    <input type="submit" name= "sent" value ="J'ajoute">


    <inpu</form>
</body>
</html>