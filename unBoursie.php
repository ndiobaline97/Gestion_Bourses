<?php
 require("Autoloader.php");
 Autoloader::register();
 $connect=Database::connect();
 $objet=new EtudiantService($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Liste</title>
</head>
<body>
    <h1><strong>BOURSIES<strong></h1> 
    <table  class="table">
        <thead class="thead-dark">
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date Naissance</th>
            <th>Telephone</th>
            <th>Email</th>
        </thead>
        <tbody>
        <?php
                foreach($objet->findToutBoursie() as $val){
                    echo'<tr>';
                    echo'<td>'.$val['matricule'].'</td>';
                    echo'<td>'.$val['nom'].'</td>';
                    echo'<td>'.$val['prenom'].'</td>';
                    echo'<td>'.$val['date_naiss'].'</td>';
                    echo'<td>'.$val['telephone'].'</td>';
                    echo'<td>'.$val['email'].'</td>';
                    echo'</tr>';
                }
            ?>
        </tbody>
    </table>
</body>
</html>