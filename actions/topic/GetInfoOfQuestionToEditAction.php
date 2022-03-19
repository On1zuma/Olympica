<?php

require('actions/database.php');

//Vérifier si l'id est bien passé en param dans l'url
if(isset($_GET['id']) AND !empty($_GET['id'])){//verifier si la donnée n'est pas vide 

    $idoftopic = $_GET['id'];

    //Vérifier si le topic existe
    $checkiftopicexists = $bdd->prepare('SELECT * FROM topic WHERE id = ?');
    $checkiftopicexists->execute(array($idoftopic));


    if($checkiftopicexists->rowCount() > 0){

        //Récupérer les données du topic
        $topicinfo = $checkiftopicexists->fetch();
        if($topicinfo['id_auteur'] == $_SESSION['id']){

            $title = $topicinfo['titre'];
            $desc = $topicinfo['description'];
            $tag = $topicinfo['tag'];
            $date =$topicinfo['date_publication'];
     
            //pour retirer les br
            $desc = str_replace(
               '<br />','',  $desc

            );

   


        }else{
            $errorMSG ="Impossible d'apporter des modifications";
        }
        
    }else{
        $errorMSG ="Aucun topic n'a été trouvé ";
    }



}else{
    $errorMSG ="Aucun topic n'a été trouvé ";

}