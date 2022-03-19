<?php require('actions/users/loginAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<?php include 'includes/navbar2.php'  ?>
<body>

    <br><br>
    <form class="container" method="POST">


    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Pseudo</label>
        <input type="text" class="form-control" name="pseudo" >
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password"  >
    </div>


    <?php if(isset($errorMSG)){echo '<p>'.$errorMSG. '</p>';}?> <!--message remplire les champs pour crée compte -->
    <button type="submit" class="btn btn-primary" name="validate" >Se connecter</button>
    <br><br>
    <a href="signup.php"> <p> S'inscrire </p></a>  
    </form> 
<br>
    <center>
    <div class=" col-8">
                <div class="card-header bg-dark  text-white">
                   Compte libre
                </div>
                <div class="card-body card-header bg-ligh" >
                    #Pseudo: 1234 <br>
                    #Password: 1234



                
                <br><br><br>


                </div>

                <br>
            </div>
     </center>
    
</body>
</html>