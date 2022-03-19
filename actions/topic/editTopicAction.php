<?php

require('actions/database.php');


if(isset($_POST['validate'])){
    //verifier si les champs sont remplis
    if(!empty($_POST['title']) AND !empty($_POST['desc']))
    {

        //donnée qu'on passe dans la requete

        $new_topicTitle = htmlspecialchars($_POST['title']); // on appel les variables
        $new_topicDescription =nl2br( htmlspecialchars($_POST['desc']));// pour permettre les sauts de lignes
        $new_topicTag = htmlspecialchars($_POST['tag']);

        //modifier les infos de la question qui possède l'id rentré en paramètre
        $editTopicOnSite = $bdd->prepare('UPDATE topic SET titre = ?, description= ?, tag= ? WHERE id= ?');
        $editTopicOnSite->execute(array($new_topicTitle,$new_topicDescription,$new_topicTag, $idoftopic));






        //Redirection vers la page d'affichage des questions de l'user
        header('Location: mestopic.php');





    }else{
        $errorMSG = "Veuillez compléter les champs titre et description...";
    }

    
}