<?php

session_start();

if(!$_SESSION['password']){
    header('Location: login.php');
  }

if(isset($_GET['id']) == !empty($_GET['id'])){
    require_once('ID.php');

    // Supprime les balises HTML et PHP d'une chaîne
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `user` WHERE `id` = :id';

    $query = $pdo->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);

    $query->execute();

    $crud = $query->fetch();

    if(!$crud){
        $_SESSION['error'] = "Cet id n'existe pas";
        header('location: index.php');
    }

}else {
    $_SESSION['error'] = "URL invalid";
    header('location: index.php');
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
  <link rel="stylesheet" href="assets/css/style2.css">
  <title>Détails crud</title>

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

  <div class="bck">
    <main class="container">
      <div class="row">
        <section class="col-12">
          <h2>Détails du crud de <?= $crud['firstname'] ?></h2>
          <p>ID: <?= $crud['id'] ?></p>
          <p>Prénom: <?= $crud['firstname'] ?></p>
          <p>Nom: <?= $crud['lastname'] ?></p>
          <p>Poste: <?= $crud['footpost'] ?></p>
          <p>Numéro: <?= $crud['footnumber'] ?></p>
          <p>Email: <?= $crud['mail'] ?></p>
          <p>Date modifié: <?= $crud['updatedate'] ?></p>

          <p><a href="index.php" id="btn" class="btn btn-primary">Retour</a></p>
        </section>
      </div>
    </main>
  </div>

  <!-- footer -->
  <?php
      include('header_footer/footer.php');
    ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>