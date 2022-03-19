<?php
require('actions/users/securityAction.php');
require('actions/topic/GetInfoOfQuestionToEditAction.php');
require('actions/topic/editTopicAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
<?php include 'includes/navbar.php';  ?>

                                    <br>

<div class="container">
      <?php

if (isset($desc)){
    ?>
                  
    <form class="container" method="POST">
        <div class="mb-3"><!-- TITRE DU TOPIC-->
            <label for="exampleInputPassword1" class="form-label">Nom du topic</label>
            <input type="text" class="form-control" name="title" value="<?php echo $title  ?>">
        </div>


        <div class="mb-3"><!-- DESC TOPIC-->
          <label for="exampleInputPassword1" class="form-label">Description du topic</label>
          <textarea type="text" class="form-control" name="desc" ><?php echo $desc?></textarea>
        </div>

        <div class="mb-3"><!-- TAG-->
          <label for="exampleInputPassword1" class="form-label">Vos tags (sport, musique...) <i><font size="-3" >(optionnel)</font></i></label> 
          <textarea type="text" class="form-control" name="tag"><?php echo $tag?></textarea>
        </div>

        


        <br> <!-- bouton soumettre-->
        <button type="submit" class="btn btn-primary" name="validate" >Appliquer les modifications</button>
        <br><br>
        <p><i>date de publication: <?php echo $date?></i></p>
    </form> 
      <?php


}else{

}

      ?>




      <br> <!-- bouton soumettre-->
      <?php
      if(isset($errorMSG)){
        echo '<p>'.$errorMSG. '</p>';
        }elseif(isset($successMSG)){
          echo '<p>'.$successMSG. '</p>';
        }
        ?> 
</div>
      


      



</html>
</body>