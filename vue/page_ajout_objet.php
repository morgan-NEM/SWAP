<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../includes/styles/style.css">
    <link rel="stylesheet" href="../includes/styles/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../includes/styles/footer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
include '../includes/banner.php';
include '../includes/connexion_bdd.php';



if (isset($_FILES['img_objet'])) {
    //$image = $_FILES["img_objet"];
    $erreur = "";
    $prix = $_POST["sous"];
    if (1 > $prix || $prix > 1000) {
        $erreur .= "Votre prix n'est pas correct";
    }
    if (!empty($_FILES['img_objet']['size'])) {
        $erreur = 0;
        $img_erreur = null;
        $img_erreur1 = null;
        $img_erreur2 = null;
        $img_erreur3 = null;
        $maxsize = 10000000; //Poid de l'image
        $maxwidth = 5000; //Largeur de l'image
        $maxheight = 5000; //Longueur de l'image
        $extensions_valides = array('jpg', 'jpeg', 'gif', 'png', 'bmp');
        //vérification post (nom+ description)
        
        
        if ($_FILES['img_objet']['error'] > 0) {
            $img_erreur = "Erreur lors du tranfsert de l'image : ";
        }
        if ($_FILES['img_objet']['size'] > $maxsize) {
            $erreur++;
            $img_erreur1 = "Le fichier est trop gros :
            (<strong>" . $_FILES['img_objet']['size'] . " Octets</strong>
            contre <strong>" . $maxsize . " Octets</strong>)";
        }

        $image_sizes = getimagesize($_FILES['img_objet']['tmp_name']);
        if ($image_sizes[0] > $maxwidth or $image_sizes[1] > $maxheight) {
            $erreur++;
            $img_erreur2 = "Image trop large ou trop longue :
            (<strong>" . $image_sizes[0] . "x" . $image_sizes[1] . "</strong> contre
            <strong>" . $maxwidth . "x" . $maxheight . "</strong>)";
        }

        $extension_upload = strtolower(substr(strrchr($_FILES['img_objet']['name'], '.'), 1));
        if (!in_array($extension_upload, $extensions_valides)) {
            $erreur++;
            $img_erreur3 = "Extension de l'image incorrecte";
        }
    }
    if ($erreur == 0) {
        $image=$_FILES["img_objet"];
        move_uploaded_file($image["name"],'../images');
        $query = $db->prepare('INSERT INTO objet(nom_objet, prix_objet, desc_objet, img_objet) VALUES (?, ?, ?, ?)');
        $query->execute(array
            (
                $_POST["nom_objet"],
                $prix,
                $_POST["description"],
                $image["name"],

            ));
        $query->closeCursor();

    }
    else if( $erreur !=0){
        echo "L'objet n'a pas été ajouté" .$img_erreur. $img_erreur1. $img_erreur2.$img_erreur3;
    }
    else if ($erreur==0) echo "L'objet a bien été enregistré";

} else {?>

    <h1>Ajouter votre article</h1>
    <form method= "post" enctype="multipart/form-data">
    <input type="text" name="nom_objet" placeholder="Nom de l'article" required><br/>
    <textarea cols="40" row="4" name="description" placeholder="Description de l'article" required></textarea><br />
    Sélectionnez une image: <input type="file" name="img_objet" id="img_objet" required><br />
    Prix demandé (en SouApp): <input type="text" name=sous required> <br />
    <input type="hidden" name="sent">
    <input type="submit" name= "envoi" value ="J'ajoute">


    </form>
    <?php }?>
</body>
</html>