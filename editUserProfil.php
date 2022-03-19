<?php
require('actions/users/securityAction.php');
require('actions/users/GetInfoOfProfilAction.php');
require('actions/users/editProfilAction.php');
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
                  
    <form class="container" method="POST" enctype="multipart/form-data">
        <div class="mb-3"><!-- PSEUDO-->
            <label for="exampleInputPassword1" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo" value="<?php echo $pseudo  ?>">
        </div>


        <div class="mb-3"><!-- DESC PROFIL-->
          <label for="exampleInputPassword1" class="form-label">Description de votre profil</label>
          <textarea type="text" class="form-control" name="desc" ><?php echo $desc?></textarea>
        </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Image de profil <i><font size="-3" >(optionnel)</font></i></label>
            <input type="file" class="form-control" name="avatar">
          </div>

        <br> <!-- bouton soumettre-->
        <button type="submit" class="btn btn-primary" name="validate" >Appliquer les modifications</button>
        <br><br>
        
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