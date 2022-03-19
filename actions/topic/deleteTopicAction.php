<?php
//verifier si l'user et bien co sinon il va tout delete...
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: ../../login.php');
}

require('../database.php');
//isset permet de verifier si une variable php est bien déclarée
if(isset($_GET['id']) AND !empty($_GET['id']))
{//verifier si la donnée n'est pas vide

    //id passé en param 
    $idOfTheTopicExists= $_GET['id'];

    //verifier si la question existe
    $checkiftopicexists = $bdd->prepare('SELECT * FROM topic WHERE id = ?');
    $checkiftopicexists->execute(array($idOfTheTopicExists));
   
    if($checkiftopicexists->rowCount()>0){


        $usersInfo = $checkiftopicexists->fetch();//aller à
        if($usersInfo['id_auteur'] == $_SESSION['id']){//on regarde si l'id de l'auteur et bien l'id de l'autre stocké dans le bon topic
            echo"Suppression";
            $deletTopic =$bdd->prepare('DELETE FROM topic WHERE id =?');
            $deletTopic->execute(array($idOfTheTopicExists));

            header('Location: ../../mestopic.php');


        }else{
            echo"C'est pas votre topic !";
        }
        


    }else{
        echo"Aucun topic n'a été trouvée ";
    }
       



}else{
    echo"Aucun topic n'a été trouvée ";
}
