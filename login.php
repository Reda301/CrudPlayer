<?php

  require_once 'ID.php';

/*admin */

try{

      session_start();

      if(isset($_POST['submit'])){
        if(isset($_POST['lastname']) && isset($_POST['password'])){

            $lastname_par_defaut = "admin";
            $password_par_defaut = "Admin.11";
            
            $lastname = htmlspecialchars ($_POST['lastname']);
            $mdp = $_POST['password'];
          
            $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
            
              // si $lastname_saisi = $lastname_par_defaut + $password_saisi = $password_par_defaut donc c'est ok
              if($lastname == $lastname_par_defaut AND $mdp == $password_par_defaut){
                $_SESSION['password'] = $mdp_hash;
                $_SESSION['roleadmin'] = 1;
                 header('Location: index.php');
              }
              // Partie membre
            $lastname = htmlspecialchars ($_POST['lastname']);
            $mdp = $_POST['password'];
          
            $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
          
            $user = $pdo->prepare("SELECT lastname, password FROM user WHERE lastname = :lastname");
            $user->execute([':lastname'=> $lastname]);
          
            $sql = $user->fetch();
          
          // si mon fetch est OK je fais les vérification sinon renvoie une erreur.

          if($sql !== false){
            echo 'ok';
            if(password_verify($mdp, $sql['password']))
              {
                echo 'Login correct !';
                $_SESSION['password'] = $sql['password'];
                $_SESSION['roleadmin'] = 0;

                header ('Location: index.php');
              } 
          
              else 
              {
                  echo "Ce compte n'existe pas dans nos données ou vos données sont fausse:";
              }
          }else{
            echo "Vous n'avez pas de compte, veuillez vous inscrire";
          }
            
        }
      
      }
  }
      
      catch(Exception $e){
        echo 'ERROR :' .$e->getMessage();
      }




        
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Page de Connexion</title>
</head>

<body>

  <div id="block2">
    <h2>Connexion</h2>

    <div class="container">
      <div class="row">
        <div class="span6">
          <div class="controls controls-row">

            <form method='POST'>
              <div class="mb-3">
                <label for="exampleInputlastname1" class="form-label">Nom</label>
                <input type="text" name='lastname' class="form-control" id="lastname" aria-describedby="lastnameHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" name='password' class="form-control" id="password">
              </div>

              <button type="submit" name='submit' class="btn btn-primary">Valider</button>

              <a href="Espace_membre/inscription.php">Pas encore inscrit ?</a>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>