<?php

    if(isset($_GET['supprime']) AND !empty($_GET['supprime'])){
       $supprime = (int) $_GET['supprime'];

       $sql = $pdo->prepare('DELETE FROM user WHERE id = ?');
       $sql->execute(array($supprime));
   }

