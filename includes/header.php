<header>
  
  <div style="display:flex; justify-content: space-between;">
  <img id="logo" src="images/logo.png">
    <nav>
      <ul style="height: 30px;">
        <li><a href="index.php">Acceuil</a></li>
        <li><a href="collection.php">Collection</a></li>
        <?php if(isset($_SESSION['email'])){
            echo '<li><a href="add_pokemon.php">Ajouter un pokemon</a></li>';
            echo '<li><a href="profile.php">Mon compte</a></li>';
            echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
          }else{
            echo '<li><a href="connexion.php">Connexion</a></li>';
          }
          ?>
      </ul>
    </nav>
  </div>
</header>
    