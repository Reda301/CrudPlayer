<?php
try {

//connexion bdd

    $pdo = new PDO("mysql:host=localhost;dbname=Formfour",'root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS Formfour");
  
    
//creation des tables    

    $mytable = "CREATE TABLE IF NOT EXISTS `user`( 
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    mail VARCHAR(255), 
    footpost VARCHAR(255),
    footnumber VARCHAR (6),
    password VARCHAR(255), 
    createdate TIMESTAMP, 
    updatedate TIMESTAMP,
    roleadmin TINYINT)";

  $pdo->exec($mytable);
  
  }

    catch(Exception $e){
    echo 'ERROR :' .$e->getMessage();
  }

  ?>