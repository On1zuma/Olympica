<?php
require('actions/users/securityAction.php');
require('actions/topic/lestopicAction.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
    <body>
        <?php include 'includes/navbar.php';  ?>
<!-- ON PEUT VOIR ICI QU'ON AFFICHE LES TOPICS DES GENS-->
      <br>
<?php
    while($topic = $getAllMyTopic->fetch()){
?>
<center>
        <div class="card w-75">
            <div class="card-body">
                <h5 class="card-title">   <a style="text-decoration:none" class="text-dark" href="topic.php?id=<?php echo $topic['id'];?>"><?php echo $topic['titre'] ?></a></h5>
                <p class="card-text"><?php echo $topic['description']; ?></p>
       
                  
                <font size="-3" ><p class="card-text"><i><b><?php echo $topic['tag']; ?></b></i></p></font><br>
       
                <a href="topic.php?id=<?php echo $topic['id'];?>" class="btn btn-primary">Ouvrir</a>    
                <a class="text-secondary" href="edittopic.php?id=<?php echo $topic['id'];?> ">Editer</a>
                <a class="text-muted" href="actions/topic/deleteTopicAction.php?id=<?php echo $topic['id'];?>">Supprimer</a>
                
            </div>
        </div>
        <p></p>
</center>
<?php
    };
?>

    </body>
</html>
