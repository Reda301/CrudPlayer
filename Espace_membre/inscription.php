<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta lastname="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Formulaire</title>
</head>

<?php

    
require '../ID.php';

try{ 
                
    
    
    //On utilise les requêtes préparées et des marqueurs nommés 
      

          if(isset($_POST['submit'])){
            if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['mail'])){
          
          // htmlspécialchars = Convertit les caractères spéciaux en entités HTML
          $firstname = htmlspecialchars ($_POST['firstname']);
          $lastname = htmlspecialchars ($_POST['lastname']);
          $mail = htmlspecialchars ($_POST['mail']);
          $mdp = $_POST['password'];
          $date = new DateTime('NOW', new DateTimeZone('Europe/Paris'));


          $mdp = password_hash($mdp, PASSWORD_DEFAULT);
          
          
          $query = $pdo->prepare("SELECT lastname, mail FROM user WHERE lastname = :lastname OR mail = :mail");
          $query->execute(['lastname'=> $lastname, 'mail'=> $mail]);
          
          
          $sql = $query->fetch();
            
          
            if ($sql !== False && $lastname == $sql['lastname']) 
            {
              $erreur = 'Nom Existe déjà';
            }

            elseif ($sql !== False && $mail == $sql['mail'])
            {
              $erreur = 'Mail Existe déjà';
            }


            else
            {
              $query = $pdo->prepare("INSERT INTO user( lastname, firstname, mail, createdate, password) VALUES (:lastname, :firstname, :mail, :createdate, :password)");

              // Lie un paramètre à un nom de variable spécifique
              $query->bindParam(':lastname', $lastname);
              $query->bindParam(':firstname', $firstname);
              $query->bindParam(':mail', $mail);
              $query->bindParam(':password', $mdp);
              $query->bindParam(':createdate', $date->format("Y-m-d H:i:s"), PDO::PARAM_STR);

              $query->execute();
              
                header('Location: ../login.php');
              }
              echo 'inscription réussi';
            }

        }

      }
    
  
          catch(Exception $e){
          echo 'ERROR :' .$e->getMessage();
      }

    

?>

<body>

  <div class="container my-5">
    <h1>Create your Account</h1>

  </div>

  <div id="block2">

    <div class="container">
      <div class="row">
        <div class="span6">

          <div class="controls controls-row">

            <form method='POST'>
              <div class="mb-3">
                <label for="lastname" class="form-label">Nom</label>
                <input type="name" required="required" name="lastname" class="form-control" id="lastname">

              </div>
              <div class="mb-3">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="name" required="required" name="firstname" class="form-control" id="firstname">
              </div>
              <div class="mb-3">
                <label for="mail" class="form-label">Email</label>
                <input type="mail" required="required" name="mail" class="form-control" id="mail"
                  aria-describedby="mailHelp">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" required="required" name="password" class="form-control" id="password">
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>

          <div class="controls">

            <a href="../login.php">Connectez vous</a>

          </div>

        </div>
      </div>
    </div>
  </div>



</body>

</html>