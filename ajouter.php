<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Ajouter un utilisateur</h2>
        <p class="erreur_message">
        </p>
        <form action="" method="GET">
            <label>Nom</label>
            <input type="text" name="nom" id="name">
            <label>Prénom</label>
            <input type="text" name="prenom" id="firstname">
            <label>âge</label>
            <input type="number" name="age" id="age">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>

</html>


<?php

    include 'connexion.php';

    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $firstname = $_POST['firstname']; 
        $age = $_POST['age']; 
        
        //CHECK DUPLICATE & ADD IN DATABASE
        $check_duplicate = "SELECT * FROM db_php WHERE name = '$name' AND firstname = '$firstname'";
        $result_check = mysqli_num_rows(mysqli_query($conn,$check_duplicate));

        if($result_check > 0){
            echo '<script>alert("Record already existed")</script>';
        }else{
            $insert_sql =  "INSERT INTO db_php VALUES ('','$name', '$firstname', '$age')";
        
            if (mysqli_query($conn,$insert_sql)){
                echo '<script>alert("New record created successfully")</script>';
            }else{
                echo "Error: " . $insert_sql . "<br>" . mysqli_error($insert_sql);
            }
        }
    }
        
        
?>