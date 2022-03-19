<?php

require('actions/database.php');


if(isset($_POST['validate'])){
    //verifier si les champs sont remplis
    if(!empty($_POST['pseudo']) AND !empty($_POST['desc']))
    {

                //TRAVAIL SUR L'image !!!///////////////////////////////////////////
        if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
            $taillemax= 4097152;
            $extensionValides = array('jpg','jpeg', 'gif', 'png');
            if($_FILES['avatar']['size'] <= $taillemax){
                //en tout on renvoit l'extension avec un point on ignore le premier carac et strr recu l'extension et strlower pr minuscule
                $extensionUpload =strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1)); //permet d'ignorer un carac de la chaine //permet de connaitre l'extension
                if(in_array($extensionUpload, $extensionValides)){

                    $nom = $_FILES['avatar']['tmp_name'];
                    $chemin="actions/users/avatars/".$_SESSION['id'].".".$extensionUpload;
                    $resultat = move_uploaded_file($nom, $chemin);//tmp chemain temporaire du fichier
                    if($resultat){// si le deplacement de l'image à bien été fait on continu 
                        $updateavatar = $bdd ->prepare('UPDATE users SET avatar = :avatar WHERE id= :id');
                        $updateavatar -> execute(array(
                            'avatar' => $_SESSION['id'].".".$extensionUpload,
                            'id' => $_SESSION['id']
                        ));


                        //////////////////////////////////////////////////////////////////////////////et la on revient au truc de base 
                                //donnée qu'on passe dans la requete

        $new_topicTitle = htmlspecialchars($_POST['pseudo']); // on appel les variables
        $new_topicDescription =nl2br( htmlspecialchars($_POST['desc']));// pour permettre les sauts de lignes
       
         //verifie si le user existe déja pour empecher les copies pseudo
         $checkifuseralreadyexists = $bdd -> prepare('SELECT * FROM users WHERE pseudo = ?');
         $checkifuseralreadyexists ->execute(array($new_topicTitle)); // on regard si les gens utilise les mêmes pseudo
    
        $profilinfo = $checkifuseralreadyexists->fetch();



         if($checkifuseralreadyexists-> rowCount() == 0){// si on compte un meme utilisateur alors message d'erreur

        //modifier les infos de la question qui possède l'id rentré en paramètre
        $editTopicOnSite = $bdd->prepare('UPDATE users SET pseudo = ?, description= ? WHERE id= ?');
        $editTopicOnSite->execute(array($new_topicTitle,$new_topicDescription, $idoftopic));
        $errorMSG = "Le profil à bien été mit à jour...";
        header('Location: actions/users/logoutActionAprésModifProfil.php');
        //Redirection vers la page d'affichage des questions de l'user
     //   header('Location: profile.php'echo $_SESSION['id']);



         }elseif($new_topicTitle ==  $_SESSION['pseudo'])
         {

            $editTopicOnSite = $bdd->prepare('UPDATE users SET pseudo = ?, description= ? WHERE id= ?');
            $editTopicOnSite->execute(array($new_topicTitle,$new_topicDescription, $idoftopic));
            $errorMSG = "Le profil a bien été mis à jour...";
            header('Location: actions/users/logoutActionAprésModifProfil.php');
 

         }
         
         
         
         else{
            $errorMSG = "Pseudo déjà utilisé...";

         }//////////////////////////////////FIN TRUC DE BASE! sur le changement de pseudo et description

                    }else $errorMSG ="Erreur durant l'importation de votre photo de profil";//message d'erreur

                }else $errorMSG ="La photo de profil doit être au format jpg, jpeg, gif ou encore png";//message d'erreur

            }else echo$errorMSG ="Photo de profil est supérieure à 4 mo";//message d'erreur

        }else{//////////////////////////////////////////////////////////////////////////////////////////TRAVAIL SUR IMAGE

        //donnée qu'on passe dans la requete

        $new_topicTitle = htmlspecialchars($_POST['pseudo']); // on appel les variables
        $new_topicDescription =nl2br( htmlspecialchars($_POST['desc']));// pour permettre les sauts de lignes
       
         //verifie si le user existe déja pour empecher les copies pseudo
         $checkifuseralreadyexists = $bdd -> prepare('SELECT * FROM users WHERE pseudo = ?');
         $checkifuseralreadyexists ->execute(array($new_topicTitle)); // on regard si les gens utilise les mêmes pseudo
    
        $profilinfo = $checkifuseralreadyexists->fetch();



         if($checkifuseralreadyexists-> rowCount() == 0){// si on compte un meme utilisateur alors message d'erreur

        //modifier les infos de la question qui possède l'id rentré en paramètre
        $editTopicOnSite = $bdd->prepare('UPDATE users SET pseudo = ?, description= ? WHERE id= ?');
        $editTopicOnSite->execute(array($new_topicTitle,$new_topicDescription, $idoftopic));
        $errorMSG = "Le profil à bien été mit à jour...";

        header('Location: actions/users/logoutActionAprésModifProfil.php');
        //Redirection vers la page d'affichage des questions de l'user
     //   header('Location: profile.php'echo $_SESSION['id']);



         }elseif($new_topicTitle ==  $_SESSION['pseudo'])
         {

            $editTopicOnSite = $bdd->prepare('UPDATE users SET pseudo = ?, description= ? WHERE id= ?');
            $editTopicOnSite->execute(array($new_topicTitle,$new_topicDescription, $idoftopic));
            $errorMSG = "Le profil a bien été mis à jour...";
            header('Location: actions/users/logoutActionAprésModifProfil.php');
 

         }
         
         
         
         else{
            $errorMSG = "Pseudo déjà utilisé...";

         }}


    }else{
        $errorMSG = "Veuillez compléter les champs pseudo et description...";
    }

    
}
