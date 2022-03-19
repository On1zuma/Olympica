<?php include 'actions/users/signupAction.php';?>
<!DOCTYPE html>
<html lang="en">
 <?php include 'includes/head.php'; ?>
 <?php include 'includes/navbar2.php'  ?>
<body>
<br> <br>
<form class="container" method="POST" enctype="multipart/form-data">


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Addresse email </label>
    <input type="email" class="form-control" name="email" >
    <div id="emailHelp" class="form-text"></div>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Pseudo</label>
    <input type="text" class="form-control" name="pseudo" >
  </div>

  <div class="mb-3"><!-- DESC TOPIC-->
    <label for="exampleInputPassword1" class="form-label">À propos de moi  <i><font size="-3" >(optionnel)</font></i></label>
    <textarea type="text" class="form-control" name="desc" ></textarea>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password"  >
  </div>

  <?php if(isset($errorMSG)){echo '<p>'.$errorMSG. '</p>';}?> <!--message remplire les champs pour crée compte -->
  <button type="submit" class="btn btn-primary" name="validate" >S'inscrire</button>
  <br><p></p>
  <a href="login.php"> <p>Je suis déjà inscrit</p></a>
</form>    


</body>
</html>