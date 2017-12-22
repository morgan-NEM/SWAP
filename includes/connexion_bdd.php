<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=swappist', 'admin', 'admin');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>