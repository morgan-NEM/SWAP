<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swapp - Connexion</title>
</head>
<body>
<div><?php include('includes/banner.php'); ?></div>

<h1 class="centrer">Connexion</h1>

<form method="post">
        
            <p class="centrer"><input type="text" name="identifiant" placeholder="Identifiant"></p>
            <p class="centrer"><input type="password" name="password" placeholder="Mot de passe"></p>
            <p class="centrer"><input type="submit"></p>  
            <p class="centrer"><a href="./register.php">Pas encore inscrit ?</a></p>   
            
            
    
</form>


<div><?php include('includes/footer.php'); ?></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>