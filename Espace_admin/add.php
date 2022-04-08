<?php

    session_start();

    if(!$_SESSION['password']){
        header('Location: ../login.php');
      }
   
    if($_POST){
        if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['mail'])&& !empty($_POST['footpost'])&& !empty($_POST['footnumber'])){

    require_once('../ID.php');

        //on nettoie les données envoyées
        $firstname = strip_tags($_POST['firstname']);
        $lastname = strip_tags($_POST['lastname']);
        $mail = strip_tags($_POST['mail']);
        $footpost = strip_tags($_POST['footpost']);
        $footnumber = strip_tags($_POST['footnumber']);

        $sql = 'INSERT INTO `user`(`firstname`, `lastname`, `mail`, `footpost`, `footnumber`) VALUES (:firstname, :lastname, :mail, :footpost, :footnumber)';

        $query = $pdo->prepare($sql);

        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':footpost', $footpost, PDO::PARAM_STR);
        $query->bindValue(':footnumber', $footnumber, PDO::PARAM_STR);

        $query->execute();

        $_SESSION['message'] = "account add";
        header('Location: ../index.php');

    }else{
        $_SESSION['error'] = "The form is incomplete";
    }
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
    <title>Add a account</title>
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
                <h1>Add a account</h1>
                <form method='post'>
                    <div class="form-group">
                        <label for="firstname">Prénom</label>
                        <input type="text" id="firstname" name="firstname" class='form-control'>
                    </div>
                    <div class="form-group">
                        <label for="Name">Nom</label>
                        <input type="text" id="lastname" name="lastname" class='form-control'>
                    </div>
                    <div class="form-group">
                        <label for="mail">Email</label>
                        <input type="text" id="mail" name="mail" class='form-control'>
                    </div>
                    <div class="form-group">
                        <label for="footpost">Poste</label>
                        <input type="text" id="footpost" name="footpost" class='form-control'>
                    </div>
                    <div class="form-group">
                        <label for="footnumber">Numéro</label>
                        <input type="text" id="footnumber" name="footnumber" class='form-control'>
                    </div>
                    <button type='submit' class="btn btn-primary">Submit</button>
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