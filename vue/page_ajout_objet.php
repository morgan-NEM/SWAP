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
include '../includes/banner.php';
include '../includes/connexion_bdd.php';



if (isset($_FILES['img_objet'])) {
    $image = $_FILES["img_objet"];    
    $erreur1 = "";
    $prix = $_POST["sous"];
    
        
    }
    if (!empty($_FILES['img_objet']['size'])) {
        $erreur = 0;
        $img_erreur = null;
        $img_erreur1 = null;
        $img_erreur2 = null;
        $img_erreur3 = null;
        $maxsize = 10000000; //Poids de l'image
        $maxwidth = 5000; //Largeur de l'image
        $maxheight = 5000; //Longueur de l'image
        $extensions_valides = array('jpg', 'jpeg', 'png', 'bmp');
        //vérification post (nom+ description)
        
        if (1 > $prix || $prix > 1000) {
            $erreur1 = "Votre prix n'est pas correct";
            $erreur++;

        if ($image['error'] > 0) {
            $img_erreur = "Erreur lors du tranfsert de l'image : ";
            $erreur++;
        }
        if ($image['size'] > $maxsize) {
            $erreur++;
            $img_erreur1 = "Le fichier est trop gros :
            (<strong>" . $_FILES['img_objet']['size'] . " Octets</strong>
            contre <strong>" . $maxsize . " Octets</strong>)";
        }

        $image_size = getimagesize($image['tmp_name']);
        if ($image_size[0] > $maxwidth or $image_size[1] > $maxheight) {
            $erreur++;
            $img_erreur2 = "Image trop large ou trop longue :
            (<strong>" . $image_size[0] . "x" . $image_size[1] . "</strong> contre
            <strong>" . $maxwidth . "x" . $maxheight . "</strong>)";
        }

        $extension_upload = strtolower(substr(strrchr($image['name'], '.'), 1));
        if (!in_array($extension_upload, $extensions_valides)) {
            $erreur++;
            $img_erreur3 = "Extension de l'image incorrecte";
        }
    }
    if ($erreur == 0) {
        //$image=$_FILES["img_objet"];
        $url= "../images/".$image['name'];
        move_uploaded_file($image["tmp_name"], $url);
        $query = $db->prepare('INSERT INTO objet( nom_objet, prix_objet, desc_objet, img_objet) VALUES (:no, :po, :do, :io)');
        $query->execute(array(
            
                "no"=> $_POST["nom_objet"],
                "po"=>$prix,
                "do"=>$_POST["description"],
                "io"=>$image["name"]

            ));
            echo "L'objet a bien été ajouté!";
        $query->closeCursor();

    }
    if( $erreur !=0 ){
        echo "L'objet n'a pas été ajouté" . $erreur1. $img_erreur. $img_erreur1. $img_erreur2. $img_erreur3;
    }
   

} else {?>


    <h1 class="centrer">Bienvenue chez Swappist !</h1>

    <div class="container" style="margin-top:40px">

        <div id="contact-form" style="!important;background-color: black">
            <div>
                <h2 style="color:white; text-align: center">Ajoutez l'article à Swapper</h2>
                <h4 style="color:white;">Une brève description, une jolie photo et c'est parti !</h4>
            </div>

            <form method="post" action="/">
                <div>
                    <label for="name">
                        <span class="required" style="color:white;">Pseudo : *</span>
                        <input type="text" id="name" name="name" value="" placeholder="Visible par tous" required="required" tabindex="1" autofocus="autofocus" />
                    </label>
                </div>
                <div>
                    <label for="email">
                        <span class="required" style="color:white;">E-mail : *</span>
                        <input type="email" id="email" name="email" value="" placeholder="Votre adresse électronique" tabindex="2" required="required" />
                    </label>
                </div>
                <div>
                    <label for="price">
                        <span class="required" style="color:white;">Votre prix : *</span>
                        <select id="subject" name="subject" tabindex="4" style="color:black;">
                            <option value="hello">En souApp ♨</option>
                            <option value="quote">1 ♨</option>
                            <option value="quote">2 ♨</option>
                            <option value="quote">3 ♨</option>
                            <option value="quote">5 ♨</option>
                            <option value="quote">10 ♨</option>
                            <option value="quote">15 ♨</option>
                        </select>
                    </label>
                </div>
                <label for="title">
                    <span class="required" style="color:white;">Titre de l'article : *</span>
                <input type="text" name="nom_objet" placeholder="Nom de l'article" required><br/>
                <div>
                    <label for="message">
                        <span class="required" style="color:white;">Décrivez votre article : *</span>
                        <textarea id="message" name="message" placeholder="Écrivez ici..." tabindex="5" required="required"></textarea>
                    </label>
                </div>
                <div>
                    <span class="required" style="color:white;">Ajoutez une photo : *</span>
                    <input type="file" name="img_objet" id="img_objet" required><br />
                </div>
                <div>
                    <button name="submit" type="submit" id="submit">Swappez !</button>
                </div>
            </form>

        </div>

    <!--
    <form method= "post" enctype="multipart/form-data">

        <div class="col-lg-6">
            <form accept-charset="UTF-8" action="" method="POST">
            <textarea class="form-control counted" name="description" placeholder="Dites-nous tout !" rows="5" style="margin-bottom:10px;" required></textarea>
            <h6 class="pull-left" id="counter">320 caractères restants</h6><br><br>
        </div>
        <div class="col-lg-6">
            <br>
        </div><div>
            <br><br>
    Sélectionnez une
    Prix demandé (en SouApp): <input type="text" name=sous required> <br />
    <input type="hidden" name="sent">
    <input type="submit" name= "envoi" value ="Je swappe">-->


    </form>
    <?php }?>
</body>
</html>