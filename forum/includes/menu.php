<?php
echo '<body>
<div id="banniere"></div>
<div id="menu">        
<div class="element_menu">
<h3>Mes options</h3>
<ul>
<li><a href="\SWAP\vue\connexion.php">Connexion</a> </li>
<li><a href="\SWAP\forum\includes\deconnexion.php">Deconnexion</a></li>
';
if(isset($_SESSION["id"]))
{
    echo "<li><a href='/SWAP/forum/voirprofil.php'>Mon compte</a></li>";
}
?>
<?php
echo '</ul>
</div>       
<div class="element_menu">';
?>
