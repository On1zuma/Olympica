<?php
require('actions/users/securityAction.php');
require('actions/topic/showTopicContentAction.php');
require('actions/topic/postAnswerAction.php');
require('actions/topic/showAllAnswersOfQuestion.php')
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
    <body>
    <?php include 'includes/navbar.php';  ?>
<p></p><br>
    <div class="container"> 

    <?php 
    if(isset($topic_date)){// on regarde que la derniere donnée et bien mise en place, si c'est le cas on peut tout afficher
    //echo $topic_title;
    //haut de la page
    ?>
    <section class="show-content">
            <h3><?php echo $topic_title; ?></h3> <!-- grace à php on peut afficher un titre par exemple qui est dans notre tableau !-->
            <hr>
            <p><?php echo $topic_desc; ?></p>
            <font size="-3" ><p class="card-text"><i><b><?php echo $topic_tag; ?></b></i></p></font>
            <hr>
            <p>Par <strong>"<?php echo $topic_pseudo; ?>"</strong>  le <i><?php echo $topic_date; ?></i></p>
            <br>
    </section>

    <section class="show-answers">
            <form class="form-group" method="POST">

                <strong><label>Réponse:</label></strong> <br>
                <textarea name="answer" class="form-control"></textarea><br>
                <button class="btn btn-dark" type="submit" name="validate">Envoyer</button><font size="-4" >
                
                <x name="nom de la personne qui écrit">Vous êtes connecté en tant que <strong><i><?php
                //pour re recup également le pseudo de l'utilisateur
                //code en general pour recup des données dans la table ici on recup des données session attention si on veut recup texte faudra faire htmlspecial...etc
                $idoftopic = $_GET['id'];
                $getAllAnswersOfThisTopic2 = $bdd->prepare('SELECT pseudo FROM users WHERE id = ?');//On recup que le pseudo de l'auteur
                $getAllAnswersOfThisTopic2->execute(array($idoftopic));//on recup dans un tableau
                $answer2 = $getAllAnswersOfThisTopic2->fetch();//fetch permet de recup les données de la requête answer
                $topic_pseudo_author = $_SESSION['pseudo'];
                echo $topic_pseudo_author;
                
                ?></strong></i></x></font> 

                
            </form>
            <br>
            
</section>



            <?php //on crée la variable answer qui stoque la reponse et on les affiches
                while($answer = $getAllAnswersOfThisTopic->fetch()){//fetch permet de recup les données de la requête answer
                    if($answer['id_auteur'] == $_SESSION['id']){//on regarde si l'id de l'auteur et bien l'id du message stocké pour afficher que ces messages en plus sombre !
                    ?>
                    
                    <div class="faire eclaire">
                        <div class="card-header bg-dark text-light" >
                        <p><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>
                     <!--Pour avoir la petite fleche à gauche de pseudo -->
                    
                
                        <strong><a style="text-decoration:none" class="text-white " href="profile.php?id=<?php echo $answer['id_auteur']?>">     <?php echo $answer['pseudo_auteur'];?>      </a>     </strong>  <font size="-3" ><?php echo $answer['date_message'];?>   <a class="text-muted" href="actions/topic/deleteMessage.php?id=<?php echo $answer['id']; ?>">Supprimer</a></font></p>
                        <p><?php echo $answer['contenu'];?></p>
                        </div>
 
                    </div>

                    <br>
                    <?php

                    }else{  //c'est donc pas les messages de mon compte donc il ne seront pas sombre
                    ?>
                        <div class="faire eclaire">
                        <div class="card-body bg-light" >
                        <p> <strong><a style="text-decoration:none" class="text-dark " href="profile.php?id=<?php echo $answer['id_auteur']?>"> <?php echo $answer['pseudo_auteur'];?> </a> </strong> <font size="-3" ><?php echo $answer['date_message'];?></font></p>
               
                        <p><?php echo $answer['contenu'];?></p>
                        </div><br>
                 <?php
                 }}?>
            
    <?php } ?>

        <?php
            if(isset($errorMSG)){
            echo '<p>'.$errorMSG. '</p>';
            }elseif(isset($successMSG)){
            echo '<p>'.$successMSG. '</p>';
            }
        ?>


    </div>



 


    </body>
    </html>