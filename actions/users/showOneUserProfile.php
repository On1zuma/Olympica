<?php
//grace à l'id dans la table on peut afficher facilement les profils
require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfUser = $_GET['id'];//pour faciliter notre code on stocke ici l'id

    $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE id = ?');//on recup des donnés d'un user qui posséde l'id rentré dans la barre de recherche
    $checkIfUserExists->execute(array($idOfUser));//on passe id of user dans le tableau

    if($checkIfUserExists->rowCount() > 0){//si execute au dessu recup bien des données alors on continu notre avance sinon error.
        $usersInfos = $checkIfUserExists->fetch();

        $user_pseudo = $usersInfos['pseudo'];  //on stoque le pseudo dans une variable plus simple
        $user_desc = $usersInfos['description']; 
        $user_avatar = $usersInfos['avatar']; 

        $gethistopic = $bdd->prepare('SELECT * FROM topic WHERE id_auteur= ? ORDER BY id DESC');//on recup ici tous les topics de l'id passé en parametre qui correspond à un user
        $gethistopic->execute(array($idOfUser));
    }else{
        $errorMSG="Error"; 
    }
}else{
    $errorMSG="Error";
}