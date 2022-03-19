<?php

require('actions/database.php');

if(isset($_POST['validate'])){// on verifie si la personne à bien envoyé son message
    if(!empty($_POST['answer'])){//on verifie si il y a bien un message 

        date_default_timezone_set('Europe/Paris');
    	$date = date('d-m-y h:i');

        $user_answer = nl2br(htmlspecialchars($_POST['answer']));//nl2br pour que les sauts de ligne soit pris en compte
//bdd et la variable qui stoque la base de donnée php
        $insertAnswer = $bdd->prepare('INSERT INTO answers(id_auteur, pseudo_auteur, id_question, contenu, date_message) VALUES(?, ?, ?, ?, ?)');//on injecte les objets dans la base de donnée sql
        $insertAnswer->execute(array(//on insert dans la base de donnée, tjr placer dans le bonne ordre
            $_SESSION['id'],//id global de l'users
            $_SESSION['pseudo'],//on recup pseudo de l'user
            $idoftopic,//on recup l'id du topic
            $user_answer,//on recupe la reponse
            $date//on set la date du message 
        ));
 
    }
}