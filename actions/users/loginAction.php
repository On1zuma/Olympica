<?php

require('actions/database.php');
// validation formulaire
 if(isset($_POST['validate']))// on verifie sur une variable existe // on a applique post comme méthode d'ou le post 
 {
    //on verifie si tous les champs son rempli
    if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){// on verifie si tous les champs son rempli &&=AND

        //les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']); //hash pour cacher et crypter les mdp hash

        //on verifie si l'user existe (pseudo good or not)
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');//* signifie on récupére tout dans la table 
        $checkIfUserExists->execute(array($user_pseudo));

        if($checkIfUserExists->rowCount() > 0){
            //récup les données de l'user
            $usersInfos = $checkIfUserExists->fetch();
            if(password_verify($user_password, $usersInfos['mdp'])){

            //Authentifier l'user sur le site et récupérer ses donnes dans des variables globales session
            $_SESSION['auth'] = true; //on authentifie le user //on le mets bien en authentifie = true
            $_SESSION['id'] = $usersInfos['id'];// on récup l'id
            $_SESSION['pseudo'] = $usersInfos['pseudo'];//on récup pseudo
            $_SESSION['email'] = $usersInfos['email'];//on récup email
            $_SESSION['avatar'] = $usersInfos['avatar'];//on récup email

            //on renvoit l'user vers la page d'acceuil
            header('location: index.php');//une fois la co bien faites ... on renvoit vers la page d'acceuil



            }else{
                $errorMSG ="Mot de passe incorrect...";//message d'erreur
            }

        }else{
            $errorMSG ="Votre pseudo est incorrect...";//message d'erreur
        }

    }else{
        $errorMSG ="Merci de remplir les champs manquants...";//message d'erreur
    }
}

 ?>