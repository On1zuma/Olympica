<?php

require('actions/database.php');
 // validation formulaire
  if(isset($_POST['validate']))// on verifie sur une variable existe // on a applique post comme méthode d'ou le post 
  {
     //on verifie si tous les champs son rempli
     if(!empty($_POST['title']) AND !empty($_POST['desc'])){

        $topic_title = htmlspecialchars($_POST['title']); // on appel les variables
        $topic_desc =nl2br( htmlspecialchars($_POST['desc']));// pour permettre les sauts de lignes
        $tag_topic = htmlspecialchars($_POST['tag']);
        $date_topic = date('d/m/Y');
        $topic_id_author = $_SESSION['id'];
        $topic_pseudo_author = $_SESSION['pseudo'];
        if(empty($_POST['passwordTopic']))
        {
        $password_Topic = htmlspecialchars($_POST['passwordTopic']);
        }else{
        $password_Topic = password_hash($_POST['passwordTopic'], PASSWORD_DEFAULT);
        }

        //on fait une genre de substitution on donne les variables dans la base de donnée à qui on rentre les variables de l'users
        $insertTopicOnWebsite = $bdd->prepare('INSERT INTO topic(titre, description, tag, code, id_auteur, pseudo_auteur, date_publication) VALUES(?, ?, ?, ?, ?, ?, ?) ');
        $insertTopicOnWebsite ->execute(
            array(
                $topic_title, 
                $topic_desc,  
                $tag_topic, 
                $password_Topic, 
                $topic_id_author, 
                $topic_pseudo_author,  
                $date_topic
            )
        );

        $successMSG ="Le topic à bien été crée";

    }else{
        $errorMSG = "Veuillez compléter les champs titre et description...";
    }

}

?>