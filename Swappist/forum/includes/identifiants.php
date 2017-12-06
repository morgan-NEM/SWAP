<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=swappist', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
