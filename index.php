<?php

  // on declare la session
   
  //si session pas ok retour login
  session_start();
  
    if(!$_SESSION['password']){
      header('Location: login.php');
    }

    require_once('ID.php');
    include_once('Espace_admin/delete.php');

    $sql = 'SELECT * FROM `user`';

    $query = $pdo->prepare($sql);

    $query->execute();

    $result = $query->fetchALL(PDO::FETCH_ASSOC);

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
    <link rel="stylesheet" href="assets/css/style2.css">
    <title>Crud</title>
</head>

<body>

    <!-- header -->
    <div class="header">
        <div class="header-right">
            <a class="active" href="index.php">Accueil</a>
            <a href="list.php">Mes joueurs</a>
            <a href="#about">À propose de nous</a>
            <a href="logout.php">Déconnexion</a>
        </div>
    </div>

    <main class="container">
        <div class="row">
            <section class='col-12'>
                <?php
                    if(!empty($_SESSION['error'])){
                        echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
                        $_SESSION['error'] = "";
                    }
                ?>
                <?php
                    if(!empty($_SESSION['message'])){
                        echo '<div class="alert alert-succes" role="alert">'.$_SESSION['message'].'</div>';
                        $_SESSION['message'] = "";
                    }
                ?>

                <h1>MY CRUD</h1>

                <table class='table'>
                    <thead>
                        <th style="color: rgb(0, 113, 220);">ID</th>
                        <th>Prénom</th>
                        <th style="color: rgb(0, 113, 220);">Nom</th>
                        <th>Poste</th>
                        <th style="color: rgb(0, 113, 220);">Numéro</th>
                        <th>Date modifié</th>
                    </thead>
                    <tbody>
                        <?php
                            foreach($result as $crud){
                        ?>

                        <td style="color: rgb(0, 113, 220);"><?= $crud['id'] ?></td>
                        <td><?= $crud['firstname'] ?></td>
                        <td style="color: rgb(0, 113, 220);"><?= $crud['lastname'] ?></td>
                        <td><?= $crud['footpost'] ?></td>
                        <td style="color: rgb(0, 113, 220);"><?= $crud['footnumber'] ?></td>
                        <td><?= $crud['updatedate'] ?></td>
                        <?php if($_SESSION['roleadmin'] === 1 ){ ?>
                        <td>
                            <a href="Espace_admin/edit.php?id=<?= $crud['id'] ?>"><button type="button"
                                    class="btn btn-success">Edit</button></a>
                        </td>
                        <td><a href="index.php?supprime=<?= $crud['id'] ?>"><button type="button"
                                    class="btn btn-danger">Delete</button></a></td>
                        </td>
                        <td><a href="action.php?id=<?= $crud['id'] ?>"><button type="button"
                                    class="btn btn-info">See</button></a></td>
                        <?php } else { ?>
                        <td><a href="action.php?id=<?= $crud['id'] ?>"><button type="button"
                                    class="btn btn-info">See</button></a></td>
                        <?php } ?>
                        </tr>
                        <?php   
                            }
                        ?>
                    </tbody>
                </table>
                <a href='Espace_admin/add.php' class="btn btn-primary">ADD a column</a>
            </section>
        </div>
    </main>

    <!-- footer -->
    <?php
      include('header_footer/footer.php');
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