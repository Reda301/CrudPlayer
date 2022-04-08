 <?php

    session_start();

    if(!$_SESSION['password']){
        header('Location: ../login.php');
      }

    if(isset($_POST['submit'])){
        if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['footpost'])&& isset($_POST['mail'])&& isset($_POST['footnumber'])){
 
         require_once('../ID.php');
 
         //on nettoie les données envoyées
         //strip_tags = Supprime les balises HTML et PHP d'une chaîne
         $id = strip_tags($_POST['id']);
         $firstname = strip_tags($_POST['firstname']);
         $lastname = strip_tags($_POST['lastname']);
         $mail = strip_tags($_POST['mail']);
         $footpost = strip_tags($_POST['footpost']);
         $footnumber = strip_tags($_POST['footnumber']);
         $date = new DateTime('NOW', new DateTimeZone('Europe/Paris'));

         $sql = 'UPDATE user SET firstname= :firstname, lastname= :lastname, footpost= :footpost, footnumber= :footnumber, mail= :mail, updatedate= :updatedate WHERE id= :id';
            
         $query = $pdo->prepare($sql);
         
         //associer une valeur à un parametre
         $query->bindValue(':id', $id, PDO::PARAM_INT);
         $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
         $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
         $query->bindValue(':mail', $mail, PDO::PARAM_STR);
         $query->bindValue(':footpost', $footpost, PDO::PARAM_STR);
         $query->bindValue(':footnumber', $footnumber, PDO::PARAM_STR);
         $query->bindValue(':updatedate', $date->format("Y-m-d H:i:s"), PDO::PARAM_STR);
         
         $query->execute();

         $_SESSION['message'] = "modified account";
        header('location: ../index.php');
 
     }else{
         $_SESSION['error'] = "The form is incomplete";
     }

    }
    


    if(isset($_GET['id']) == !empty($_GET['id'])){
        require_once('../ID.php');
    
        $id = strip_tags($_GET['id']);
    
        $sql = 'SELECT * FROM `user` WHERE `id` = :id';
    
        $query = $pdo->prepare($sql);
    
        $query->bindValue(':id', $id, PDO::PARAM_INT);
    
        $query->execute();
    
        $crud = $query->fetch();
    
        if(!$crud){
            $_SESSION['error'] = "Cet id n'existe pas";
            header('location: ../index.php');
        }
    
    }else{
        $_SESSION['error'] = "URL invalid";
        header('location: ../index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../assets/css/style2.css">
    <title>Modified account</title>
</head>

<body>

    <!-- header -->
    <?php
    include('../header_footer/header.php');
  ?>


    <main class="container">
        <div class="row">
            <section class='col-12'>
                <?php
                    if(!empty($_SESSION['error'])){
                        echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
                        $_SESSION['error'] = "";
                    }
                ?>

                <h1>Modified account</h1>

                <form method='post'>
                    <div class="form-group">
                        <label for="firstname">Prénom</label>
                        <input type="text" id="firstname" name="firstname" class='form-control'
                            value='<?= $crud['firstname']?>'>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Nom</label>
                        <input type="text" id="lastname" name="lastname" class='form-control'
                            value='<?= $crud['lastname']?>'>
                    </div>
                    <div class="form-group">
                        <label for="mail">Email</label>
                        <input type="text" id="mail" name="mail" class='form-control' value='<?= $crud['mail']?>'>
                    </div>
                    <div class="form-group">
                        <label for="footpost">Poste</label>
                        <input type="text" id="footpost" name="footpost" class='form-control'
                            value='<?= $crud['footpost']?>'>
                    </div>
                    <div class="form-group">
                        <label for="footnumber">Numéro</label>
                        <input type="text" id="footnumber" name="footnumber" class='form-control'
                            value='<?= $crud['footnumber']?>'>
                    </div>
                    <input type="hidden" value="<?= $crud['id']?>" name='id'>
                    <button type='submit' name="submit" class="btn btn-primary">Valider</button>
                </form>

            </section>
        </div>
    </main>

    <!-- footer -->
    <?php
      include('../header_footer/footer.php');
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>
</body>

</html>