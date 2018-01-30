<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8" />

    <link rel="stylesheet" type="text/css" href="../includes/styles/style.css">

<link rel="stylesheet" type="text/css" href="../includes/styles/footer.css">

    <link rel="stylesheet" href="../includes/styles/bootstrap.min.css">



    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Swapp - Produits</title>

</head>

<body>

<div><?php include '../includes/banner.php';
            include '../includes/connexion_bdd.php';
            
            
            

            
            ?>

<h1 class="centrer">Produits</h1>



<div id='wrap'>

    <div class='container'>

        <div class='row'>

            <div class='tag-header'>#swaps</div>

        </div>

        <div class='row'>
       <?php $query=$db->query('SELECT * FROM objet ORDER BY date_ajout'); 
       while ($donnees=$query->fetch()){ ?>
            <div class='col-xs-12 col-md-6 col-lg-4'>

                <div class='product-box'>

                    <div class='product'>
<?php
                       echo '<img class="product-img" src="../images/objets/'. $donnees['img_objet'].'"/>' ?>

                    </div>

                <div class="product-price"><?php echo $donnees['prix_objet'] ?> ♨︎</div>

                </div>

            </div>
       <?php } ?>
           

        </div>

    </div>

</div>












<div><?php include '../includes/footer.php';?></div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="bootstrap.min.js"></script>

</body>

</html>