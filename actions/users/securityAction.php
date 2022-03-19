<?php 
session_start();
if(!isset($_SESSION['auth'])){//si la personne n'est pas authentifié alors elle sera renvoyé vers login.php d'ou le '!'
    header('Location: login.php');
}

?>