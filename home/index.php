<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../styles/footer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swapp - Accueil</title>
</head>
<body>
<div><?php include('../includes/banner.php'); ?></div>
<div><?php include('../includes/message_accueil.php'); ?></div>

<section>   
    <div class="row">
    <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <?php include('../includes/der_articles.php'); ?>
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-4">
                <?php include('../includes/bouton_swappez.php'); ?>
            </div>
    </div>

    <div class="row">
            <div class="col-sm-8"></div>
            <div class="col-sm-4">
                <?php include('../includes/avis.php'); ?>
            </div>
</section>            
<div><?php include('../includes/footer.php'); ?></div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>