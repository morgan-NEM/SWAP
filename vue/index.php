<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../includes/styles/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../includes/styles/style.css">
    <link rel="stylesheet" type="text/css" href="../includes/styles/footer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swapp - Accueil</title>
</head>
<body>
<div><?php include '../includes/banner.php';
include '../includes/connexion_bdd.php';?></div>



<section>
        <div class="row">



            <div class="col-sm-1"></div>

            <span>







<div >



   <h1 class="centrer">Bienvenue chez Swappist !</h1>



   <h3 class="gras centrer">☆ Le meilleur site de troc ☆</h3>



    <div class="container" style="margin-top:40px">

    <div class="col-lg-6">



<img src="../images/accueil.png" height="500" width="500" alt="Accueil">



</div>



<div class="col-lg-6"">



<p class="centrer">



  <h3 class="centrer">Comment Swapper...</h3><br>
  <br>



<h4>Je propose un Swap :</h4>



<br>



<ul class="icon">



    <li>Je mets mon annonce en ligne.



        (pensez qu'une annonce avec photo est 10 fois plus consultée).</li>



    <li>Quand un Swapper me fait une demande je l'accepte si elle me convient.</li>
    <li>Une fois le Swap réalisé je reçois mes SouApp sur mon profil (si le troc



s'est fait avec des SouApp) et je laisse une évaluation.</li>



</ul>



<br>



<p class="centrer">OU</p>



<br>



<h4>Je recherche un Swap :</h4><br>


<ul class="icon">



                 <li>Je fais une recherche par catégorie ou sur la carte.</li>



                 <li>Je peux réserver directement l'objet swappé, le négocier ou simplement envoyer un message.</li>



                <li>Une fois le Swap réalisé je valide les SouApp à troquer (si le Swap s'est fait avec des SouApp)



                    et je laisse une évaluation.</li>



             </ul>
             </p>



</div>



</div>



</div>







<div class="container main-section" style="margin-bottom:40px">



<div class="row">
<?php $query=$db->query('SELECT * FROM objet ORDER BY date_ajout DESC LIMIT 0, 3'); 
       while ($donnees=$query->fetch()){ ?>
                <div class="col-md-4 col-sm-4 col-xs-12 ">


                
                    <div class="row product-part">



                        <div class="col-md-12 col-sm-12 colxs-12 img-section">

                        <?php
                       echo '<img class="product-img" src="../images/objets/'. $donnees['img_objet'].'" height="200"/>' ?>

                           



                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 product-title">



<?php  echo '<h1>'.$donnees['nom_objet'].'</h1>' ?>



</div>



<div class="col-md-12 col-sm-12 col-xs-12 product-description">



  <p> <?php echo $donnees['desc_objet'] ?>


  </p>

</div>



<div class="col-md-12 col-sm-12 col-xs-12 product-cart">



    <div class="row">



        <div class="col-md-6 col-sm-12 col-xs-6">



            <p><?php echo $donnees['prix_objet'] ?> SouApp</p>



        </div>



        <div class="col-md-6 col-sm-12 col-xs-6 text-right product-add-cart">

        <a href="#" class="btn btn-success" style="background-color:#00A185" id="jeswappe">Je swappe</a>



</div>



</div>



</div>



</div>
</div>
<?php } ?>


                



            </div>



        </div>



        </span>



    </div>
    </div>



<div class="row" style="margin-bottom:15px">



    <div class="col-sm-2"></div>



    <div class="col-sm-2">



        <?php include '../includes/bouton_swappez.php';?>



    </div>



    <div class="col-sm-2"></div>

    <div class="col-sm-4">



<div class="panel panel-default" id="slogan">



    <div class="panel-body" style="font-size:20px">Swappez en mode Troc classique</div>



</div>



<div class="panel panel-default" id="slogan">



    <div class="panel-body" style="font-size:20px">Swappez contre des SouApp</div>



</div> <div class="panel panel-default" id="slogan">



<div class="panel-body" style="font-size:20px">Négociez le Swap (objet + SouApp)</div>



</div>



</div>



<div class="col-sm-2"></div>

</section>
<div><?php include '../includes/footer.php';?></div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>
