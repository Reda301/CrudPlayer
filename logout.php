<?php        

// On appelle la session
session_start();
// On écrase le tableau de session
$_SESSION = array();
// On détruit la session
unset($_SESSION);
unset($_COOKIE);
session_destroy();
header("Cache-Control: no-store, no-cache, must-revalidate");
header('Location: login.php?');
exit;

?>    

