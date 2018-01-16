<?php
echo '<body>
<div id="banniere"></div>
<div id="menu">        
<div class="element_menu">
<h3>Mes options</h3>
<ul>
<li><a href="\Swap\vue\connexion.php">Connexion</a> </li>
<li><a href="\Swap\forum\includes\deconnexion.php">Deconnexion</a></li>
';
if(isset($_SESSION["id"]))
{
    echo "<li><a href='\Swap\forum\includes\voirprofil.php'>Mon compte</a></li>";
}
?>
<?php
echo '</ul>
</div>       
<div class="element_menu">
<h3>Navigation</h3>
<ul>
<li>Page 1</li>
<li>Page 2</li>
</ul>
</div>        
</div>
<div id="corps_forum">';
?>
