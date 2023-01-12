<?php
  //connexion à la base de données
  require_once 'pdoconfig.php';
    
    try{
        $conn = mysqli_connect($servername, $username, $password, $database);
    }catch(PDOException $pe){
        die("Could not connect to the database" . $pe->getMessage());
    }

?>
