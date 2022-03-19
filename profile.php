<?php
require('actions/users/securityAction.php');
require('actions/users/showOneUserProfile.php');
?>

<!DOCTYPE html>
<html lang="en">
<body>
<?php include 'includes/head.php'; ?>
<?php include 'includes/navbar.php'  ?>
<br>

<?php
if(isset($gethistopic)){
    ?>

        <form  class="container">
        <?php if(!empty($user_avatar)){  ?>
            <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">               
                              <!-- avatar de la personne-->
                                    <img width="200" heigt="200" src="actions/users/avatars/<?php echo $user_avatar?>">
                            </label>

                <div class="col-sm-10">
                <p></p>
                        <h4>@<?php 
                            echo $user_pseudo;
                        //lien editer si c'est le profil de la personne
                        if($usersInfos['pseudo'] == $_SESSION['pseudo']){?>

                        </h4><font size="-3" ><a class="text-muted" href="editUserProfil.php?id=<?php echo $_SESSION['id']  ?>">éditer</a></font>
                        <?php } ?>
                        <hr> <!--description -->
                <font size="-1" ><p><?php echo $user_desc;?></p></font>

                </div>
                </div>
                <?php }else{?>


    <form  class="container">
    <form class="form-inline">
            <div class="form-group mb-2">
            <!-- image de profil
                <div>
                    <?php
                        //if(!empty($_SESSION['avatar'])){
                        ?>
                        <img width="100" heigt="100" src="actions/users/avatars/<?php echo $_SESSION['avatar']?>">
                    <?php// } ?>
                </div>
            </div>-->
          
        <!-- Pseudo +desc-->
        <div>
            <p></p>
            <h4>@<?php 
                echo $user_pseudo;
            //lien editer si c'est le profil de la personne
            if($usersInfos['pseudo'] == $_SESSION['pseudo']){?>

            </h4><font size="-3" ><a class="text-muted" href="editUserProfil.php?id=<?php echo $_SESSION['id']  ?>">éditer</a></font>
            <?php } ?>
            
                <hr> <!--description -->
                <font size="-1" ><p><?php echo $user_desc;?></p></font>
            <?php } ?>
        </div>
        
            </form> 
            <form  class="container">
    <br>
    <?php while($topic = $gethistopic->fetch()){

    ?>

            <div class="card "><!--w-75 si on veut changer la taille on le met dans le class-->
                <br>
            <div class="card-body">
                <h5 class="card-title"><a style="text-decoration:none" class="text-dark" href="topic.php?id=<?php echo $topic['id'];?>"> <?php echo $topic['titre']; ?> </a></h5>
                <p class="card-text"> <?php $texte_coupe = substr($topic['description'], 0, 450).'...'; //pour reduire la taille du texte on le limite à un nombre précis...?><?php echo $texte_coupe; ?></p>

                <font size="-3" ><p class="card-text"><i><b><?php echo $topic['tag']; ?></b></i></p></font><br>
                <p>par <?php echo $topic['pseudo_auteur'];?> le <i><?php echo $topic['date_publication'];?></i> </p>
            </div>
        </div>
        <br>


        <?php
    }

    ?>
    </form>
    



    <?php
}

?>


<?php
            if(isset($errorMSG)){
            echo '<p>'.$errorMSG. '</p>';
            }elseif(isset($successMSG)){
            echo '<p>'.$successMSG. '</p>';
            }
        ?>
</body>
