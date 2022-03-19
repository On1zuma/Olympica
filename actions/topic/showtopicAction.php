<?php
require('actions/database.php');

//on recup les donnes de notre table topic
$getAllTopics = $bdd ->query('SELECT * FROM topic ORDER BY id DESC LIMIT 0,10');
$getAllpseudo = $bdd ->query('SELECT * FROM users ORDER BY id DESC LIMIT 0,20');
//verifier si il y a bien une recherche faites par l'user




if(isset($_GET['search']) AND !empty($_GET['search'])){
    $usersSearch = $_GET['search'];
    //récupérer toutes les questions qui correspondent à la recherche, en fonction du titre
       
         $getAllTopics = $bdd->query('SELECT * FROM topic WHERE description LIKE"%'.$usersSearch.'%" ORDER BY id DESC');//peut importe se qu'il y a avant et aprés le mot cherché
}









?> 
