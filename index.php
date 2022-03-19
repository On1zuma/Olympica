<?php session_start(); ?>
<?php
require('actions/topic/showtopicAction.php');
//require('actions/users/showOneUserProfile.php');
?>


<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/stylebacksite.css"> <!--notre fiche css -->
<?php include 'includes/head.php'; ?>
<body>
<?php include 'includes/navbar.php'  ?>


<header>


<div class="container">
<div class="container">
<div class="container ">
<div class="container">
<div class="container">
<div class="container "><br>
        <form action="">
        <form method="GET">
                <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="search" id="" class="form-control" >
                </div>

                <div class="col-4">
                    <button class="btn bg-dark text-white" type="submit" value="Submit">Rechercher</button>
                </div><br><br>
                </div > 
        </form>        



        <form action="index.php" method="post" >    Filtresㅤ 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="test[]" value="value1"> 
                        <label class="form-check-label" for="inlineRadio1">Titre</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="test[]" value="value2"> 
                        <label class="form-check-label" for="inlineRadio2">Tag</label>
                </div>   
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="test[]" value="value3"> 
                        <label class="form-check-label" for="inlineRadio2">Descrition</label>
                </div>      
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="test[]" value="value4"> 
                        <label class="form-check-label" for="inlineRadio2">Pseudo</label> 
                </div>              
                ㅤ
                <input class="btn bg-light text-grey" type="submit" value="Appliquer">  
        </form>  
        </form> 

        <?php  //https://www.delftstack.com/fr/howto/php/php-checkbox-checked/
        if(isset($_POST['test'])){
            if(in_array('value1', $_POST['test'])){
                echo "Titre was checked!",'  ';
            }
        
            if(in_array('value2', $_POST['test'])){
                echo "Tag was checked!",'  ';
            }
            if(in_array('value3', $_POST['test'])){
                echo "Description was checked!",'  ';
            }
            if(in_array('value4', $_POST['test'])){
                echo "Pseudo was checked!",'  ';
            }
        }
        ?>              
<br>
<br>
   <?php 
        while($topic= $getAllTopics->fetch()){
            ?>
<div class="form-group row">
    

            <div class="col-xs-12 col-8">

                <div class="card-header bg-dark  text-white">
                    <a class="text-white" href="topic.php?id=<?php echo $topic['id']?>"><?php echo $topic['titre'] ?></a>
                  
                </div>
                <?php $texte_coupe = substr($topic['description'], 0, 300).'...'; //pour reduire la taille du texte on le limite à un nombre précis...?>
                <div class="card-body">
                <?php echo $texte_coupe ?><br><br><br>


                </div>
                <div class="card-footer  " >
              Publié par <a class="text-dark "  href="profile.php?id=<?php echo $topic['id_auteur']?>"><strong><?php echo $topic['pseudo_auteur']?></strong></a> le <?php echo $topic['date_publication'] ?>
                </div>
                <br>
            </div>
    
       
            <div class="col-3 bg-dark  text-white d-none d-lg-table-cell" >
                    <strong ><a style="text-decoration:none" class="text-white "  href="profile.php?id=<?php echo $topic['id_auteur']?>">@<?php echo $topic['pseudo_auteur']?></a></strong>
                  <!--<center>  <br><br><img width="150" heigt="150" src="actions/users/avatars/<?php echo $topic['id_auteur']?>"></center>  SI ON VEUT AFFICHER LES IMAGES DE PROFIL-->
                </div>   
</div>      
        <?php
        }
        ?>
</div>
</div>
</div>
</div>
</div>
</div>


    </header>
</body>