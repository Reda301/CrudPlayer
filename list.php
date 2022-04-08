<?php session_start();
  
    if(!$_SESSION['password']){
      header('Location: login.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="assets/css/style3.css">
    <title>List</title>
</head>
<!-- header -->

<body>

    <div class="header">
        <div class="header-right">
            <a class="active" href="index.php">Accueil</a>
            <a href="list.php">Mes joueurs</a>
            <a href="#about">À propose de nous</a>
            <a href="logout.php">Déconnexion</a>
        </div>
    </div>

    <div class="container">

        <h1>My players</h1>

        <input type="text" id="filterInput" placeholder="Search names...">
        
        <ul id="names" class="collection with-header">
            <li class="collection-header">
                <h5>A</h5>
            </li>
            <li class="collection-header">
                <h5>B</h5>
            </li>
            <li class="collection-item">
                <a href="#">Brook</a>
            </li>
            <li class="collection-header">
                <h5>C</h5>
            </li>
            <li class="collection-item">
                <a href="#">Cutty</a>
            </li>
            <li class="collection-item">
                <a href="#">Chopper</a>
            </li>
            <li class="collection-header">
                <h5>D</h5>
            </li>
            <li class="collection-header">
                <h5>E</h5>
            </li>
            <li class="collection-header">
                <h5>F</h5>
            </li>
            <li class="collection-header">
                <h5>G</h5>
            </li>
            <li class="collection-header">
                <h5>H</h5>
            </li>
            <li class="collection-header">
                <h5>I</h5>
            </li>
            <li class="collection-header">
                <h5>J</h5>
            </li>
            <li class="collection-item">
                <a href="#">Jinbe</a>
            </li>
            <li class="collection-header">
                <h5>K</h5>
            </li>
            <li class="collection-header">
                <h5>L</h5>
            </li>
            <li class="collection-item">
                <a href="#">Luffy</a>
            </li>
            <li class="collection-header">
                <h5>M</h5>
            </li>
            <li class="collection-header">
                <h5>N</h5>
            </li>
            <li class="collection-item">
                <a href="#">Nami</a>
            </li>
            <li class="collection-header">
                <h5>O</h5>
            </li>
            <li class="collection-header">
                <h5>P</h5>
            </li>
            <li class="collection-header">
                <h5>Q</h5>
            </li>
            <li class="collection-header">
                <h5>R</h5>
            </li>
            <li class="collection-item">
                <a href="#">Reda</a>
            </li>
            <li class="collection-item">
                <a href="#">Robin</a>
            </li>
            <li class="collection-header">
                <h5>S</h5>
            </li>
            <li class="collection-item">
                <a href="#">Sniper</a>
            </li>
            <li class="collection-item">
                <a href="#">Sanji</a>
            </li>
            <li class="collection-header">
                <h5>T</h5>
            </li>
            <li class="collection-header">
                <h5>U</h5>
            </li>
            <li class="collection-header">
                <h5>V</h5>
            </li>
            <li class="collection-header">
                <h5>W</h5>
            </li>
            <li class="collection-header">
                <h5>X</h5>
            </li>
            <li class="collection-header">
                <h5>Y</h5>
            </li>
            <li class="collection-header">
                <h5>Z</h5>
            </li>
            <li class="collection-item">
                <a href="#">Zoro</a>
            </li>
        </ul>
    </div>

    <?php
      include('header_footer/footer.php');
    ?>

    <script src="js/main.js"></script>

</body>

</html>