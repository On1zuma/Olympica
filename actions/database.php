<?php

try{
    if(!isset($_SESSION)){
        session_start();

    }
    $bdd = new PDO('mysql:host=localhost;dbname=olympe; charset=utf8', 'root', '');//pour faire des requete facilement pour l'instant localhost host tout simplement en ligne et root 

}catch(Exception $e){//verifition pour voir si on se connecte bien à la base de donnée
    die('Une erreur à été trouvée:' . $e->getMessage());// si on arrive pas à se co on tue la page
}

?>