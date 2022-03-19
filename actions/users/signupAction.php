<?php

 require('actions/database.php');
// validation formulaire
 if(isset($_POST['validate']))// on verifie sur une variable existe // on a applique post comme méthode d'ou le post 
 {
    //on verifie si tous les champs son rempli
    if(!empty($_POST['pseudo']) AND !empty($_POST['password']) AND !empty($_POST['email'])){// on verifie si tous les champs son rempli &&=AND

        //les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT); //hash pour cacher et crypter les mdp hash, on crypte le mdp avec 'password_default' pour en cas de hack
        $user_desc =nl2br( htmlspecialchars($_POST['desc']));// pour permettre les sauts de lignes
        

        //verifie si le user existe déja pour empecher les copies pseudo
        $checkifuseralreadyexists = $bdd -> prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkifuseralreadyexists ->execute(array($user_pseudo)); // on regard si les gens utilise les mêmes pseudo

        if($checkifuseralreadyexists-> rowCount() == 0){// si on compte un meme utilisateur alors message d'erreur

            $user_avatar = htmlspecialchars($_POST['avatar']);
            //Inserer user dans la bdd
            $insertuseronwebsite = $bdd -> prepare('INSERT INTO users(pseudo, description, mdp, email, avatar)VALUES(?,?,?,?,?)');// pour inserer les données dans la table sql grace au insert into en tt l'user rentrer un pseudo puis c rentré dans la table
            $insertuseronwebsite ->execute(array($user_pseudo,$user_desc ,$user_password, $user_email, $user_avatar="default.jpg")); // on insert du coup pseudo... //l'user mtn peut s'inscrire    
      
            //récupérer les informations de l'user
            $getinfosofthisuser= $bdd -> prepare('SELECT id, pseudo, description, email, avatar FROM users WHERE pseudo = ? AND description= ? AND email = ? AND avatar=?');//travail comme avec les cookies on récup les infos des personnes
            $getinfosofthisuser->execute(array($user_pseudo, $user_desc, $user_email, $user_avatar)); // on lance la récup
    
            $usersInfos = $getinfosofthisuser ->fetch(); //variable qui recup toutes les infos d'ou fetch on crée un tableau

            //Authentifier l'user sur le site et récupérer ses donnes dans des variables globales session
            $_SESSION['auth'] = true; //on authentifie le user //on le mets bien en authentifie = true
            $_SESSION['id'] = $usersInfos['id'];// on récup l'id
            $_SESSION['pseudo'] = $usersInfos['pseudo'];//on récup pseudo
            $_SESSION['email'] = $usersInfos['email'];//on récup email
            $_SESSION['description'] = $usersInfos['description'];//on récup DESC
            $_SESSION['avatar'] = $usersInfos['avatar'];//on récup avatars

            //on renvoit l'user vers la page d'acceuil
            header('location: index.php');//une fois la co bien faites ... on renvoit vers la page d'acceuil
        }
        else{
            $errorMSG="Pseudo déjà utilisé";
        }

    }else{
        $errorMSG ="Merci de remplir les champs manquants...";//message d'erreur
    }
 }

 ?>