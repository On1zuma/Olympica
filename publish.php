<?php require('actions/users/securityAction.php');
      require('actions/topic/publishAction.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>

    <?php include 'includes/navbar.php';  ?>

<br><br>

<form class="container" method="POST">


<div class="mb-3"><!-- TITRE DU TOPIC-->
        <label for="exampleInputPassword1" class="form-label">Nom du topic</label>
        <input type="text" class="form-control" name="title" >
    </div>


  <div class="mb-3"><!-- DESC TOPIC-->
    <label for="exampleInputPassword1" class="form-label">Description du topic</label>
    <textarea type="text" class="form-control" name="desc" ></textarea>
  </div>

  <div class="mb-3"><!-- TAG-->
    <label for="exampleInputPassword1" class="form-label">Vos tags (sport, musique...) <i><font size="-3" >(optionnel)</font></i></label>
    <textarea type="text" class="form-control" name="tag" ></textarea>
  </div>

  <div class="mb-3" id="d1"><!-- Code si besoin-->
    <label for="exampleInputPassword1" class="form-label">Code du topic <i></i></label>
    <input type="password" class="form-control" name="passwordTopic"  >
  </div>  

<div class="form-check form-switch"> <!-- Activer code ou non-->
  <input class="form-check-input" type="checkbox" id="togg1" checked>
  <label class="form-check-label" for="flexSwitchCheckChecked">Ajouter un code <font size="-3" >(optionnel)</font></label>
</div>

<script>
  let togg1 = document.getElementById("togg1");
  let d1 = document.getElementById("d1");
  togg1.addEventListener("click", () => {
  if(getComputedStyle(d1).display != "none"){
    d1.style.display = "none";
  } else {
    d1.style.display = "block";
  }
})
</script>

  <br> <!-- bouton soumettre-->
  <?php
   if(isset($errorMSG)){
     echo '<p>'.$errorMSG. '</p>';
     }elseif(isset($successMSG)){
       echo '<p>'.$successMSG. '</p>';
     }
     ?> 
  
  
  
  <!--message remplire les champs pour page-->
  <button type="submit" class="btn btn-primary" name="validate" >Publier</button>
  <br><br>




</form>    




</body>
</html>

