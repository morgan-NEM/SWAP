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
    include('../includes/banner.php');
    ?>
    <h1>Ajouter votre article</h1>
    <form method= "post">
    <input type="text" placeholder="Nom de l'article"><br/>
    <textarea cols="40" row="4" name="description" placeholder="Description de l'article"></textarea><br />
    Sélectionnez une image: <input type="file" name="img_objet" id="img_objet"><br />
    Prix demandé (en SouApp): <input type="text" > <br />
    <input type="submit" name= "sent" value ="J'ajoute">


    <inpu</form>
</body>
</html>