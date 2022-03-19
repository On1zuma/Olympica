

<nav class="navbar navbar-expand-lg navbar-dark bg-dark"><!--couleur de la nav bar -->
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">Olympica</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="publish.php">Créer un nouveau topic</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="mestopic.php" >Mes topics</a>
        </li>




      <?php 
          if(isset($_SESSION['auth'])){//si la personne est co ca marche sinon ca marche pas?> 

        <li class="nav-item">
          <a class="nav-link" href="profile.php?id=<?php echo $_SESSION['id'];?>" >Mon profil</a>
        </li>

      <li class="nav-item">
          <a class="nav-link" href="actions/users/logoutAction.php" name="deco">Déconnexion</a>
      </li>

<?php
          }else{ ?>
 <li class="nav-item">
          <a class="nav-link" href="login.php" name="deco">Connexion</a>
        </li>


          <?php }


      ?>


      </ul>
      </form>
    </div>
  </div>
</nav>