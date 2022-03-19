<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){//verifier si la donnée n'est pas vide soit L'id donnée dans la barre de recherche

    $idoftopic = $_GET['id'];

    //Vérifier si le topic existe
    $checkiftopicexists = $bdd->prepare('SELECT * FROM topic WHERE id = ?');//on récup tout les objets dans la colone de cette id rentré dans la recherche avant
    $checkiftopicexists->execute(array($idoftopic));


    if($checkiftopicexists->rowCount() > 0){

        //Récupérer les données du topic ////////////4,12
        $topicinfo = $checkiftopicexists->fetch();
        //on stocke les valeurs qu'on veut dans des variables pour simplifier les choses :D
        $topic_title = $topicinfo['titre'];
        $topic_desc = $topicinfo['description'];
        $topic_tag = $topicinfo['tag'];
        $topic_id_author = $topicinfo['id_auteur'];
        $topic_pseudo = $topicinfo['pseudo_auteur'];
        $topic_date = $topicinfo['date_publication'];


        
    }else{
        $errorMSG ="Aucun topic n'a été trouvé";
    }



}else{
    $errorMSG ="Aucun topic n'a été trouvé";

}