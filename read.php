<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profs";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("La connexion a échoué : " . mysqli_connect_error());
}

// Récupérer les données des professeurs
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - List of Professeurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container my-5">
    <h2>List of Professeurs from Database</h2>
    <a class="btn btn-success" href="create.php" role="button">Ajouter un Professeur</a>

    <br>
    <br>
    <table class="table">
       <thead>
        <tr>
            <th>ID</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Heure D'entrée</th>
            <th>Heure De Sortie</th>
            <th>Action</th>
        </tr>
       </thead>
       <tbody>

       <?php
       // Vérifier si des résultats sont trouvés
       if (mysqli_num_rows($result) > 0) {
           // Afficher les résultats dans le tableau
           while($row = mysqli_fetch_assoc($result)) {
               echo "<tr>";
               echo "<td>" . $row['id'] . "</td>";
               echo "<td>" . $row['prenom'] . "</td>";
               echo "<td>" . $row['nom'] . "</td>";
               echo "<td>" . $row['email'] . "</td>";
               echo "<td>" . $row['heureDentree'] . "</td>";
               echo "<td>" . $row['heureDesortie'] . "</td>";
               echo "<td><a class='btn btn-warning btn-sm' href='edit.php?id=" . $row['id'] . "'>Modifier</a> 
                            <a class='btn btn-danger btn-sm' href='delete.php?id=" . $row['id'] . "'>Supprimer</a></td>";
               echo "</tr>";
           }
       } else {
           echo "<tr><td colspan='7'>Aucun professeur trouvé</td></tr>";
       }

       // Fermer la connexion à la base de données
       mysqli_close($conn);
       ?>

       </tbody>
    </table>
</div>

</body>
</html>
