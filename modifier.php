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
        <h2>Modifier l'employé : <?= $row['nom'] ?> </h2>
        <p class="erreur_message">
        </p>
        <form action="modifier.php" method="GET">
            <label>Nom</label>
            <input type="text" name="edit_name" id="edit_name">
            <label>Prénom</label>
            <input type="text" name="edit_firstname" id="edit_firstname">
            <label>âge</label>
            <input type="number" name="edit_age" id="edit_age">
            <input type="submit" value="Modifier" name="edit_submit">
        </form>
    </div>
</body>

</html>

<?php

    include 'connexion.php';

    if(isset($_GET['edit_submit'])){

        $edit_name = $_GET['name'];
        $edit_firstname = $_GET['firstname']; 
        $edit_age = $_GET['age']; 
        
        //FIND & EDIT IN DATABASE
        $check_data = "SELECT * FROM db_php WHERE name = '$name' AND firstname = '$firstname'";
        $result_check = mysqli_num_rows(mysqli_query($conn,$check_data));

        if($result_check > 0){

            $edit_sql =  "UPDATE db_php SET name = '$edit_name', firstname = '$edit_firstname', age = '$edit_age'";
        
            if (mysqli_query($conn,$edit_sql)){
                echo '<script>alert("Record updated successfully")</script>';
            }else{
                echo "Error: " . $edit_sql . "<br>" . mysqli_error($edit_sql);
            }

        }

    }
         
?>