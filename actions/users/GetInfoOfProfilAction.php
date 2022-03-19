<?php

require('actions/database.php');

//Vérifier si l'id est bien passé en param dans l'url
if(isset($_GET['id']) AND !empty($_GET['id'])){//verifier si la donnée n'est pas vide 

    $idoftopic = $_GET['id'];

    //Vérifier si le topic existe
    $checkiftopicexists = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $checkiftopicexists->execute(array($idoftopic));


    if($checkiftopicexists->rowCount() > 0){

        //Récupérer les données du PROFIL
        $profilinfo = $checkiftopicexists->fetch();
        if($profilinfo['id'] == $_SESSION['id']){

            $pseudo = $profilinfo['pseudo'];
            $desc = $profilinfo['description'];

     
            //pour retirer les br
            $desc = str_replace(
               '<br />','',  $desc

            );

   


        }else{
            $errorMSG ="Impossible d'apporter des modifications";
        }
        
    }else{
        $errorMSG ="Aucun profil n'a été trouvé ";
    }



}else{
    $errorMSG ="Aucun user ";

}