<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'affichage des apprenants certifiés</title>
</head>
<body>
    <?php
      //connexion à la base
      $bd = new PDO('mysql:host=localhost;dbname=tp_php_js', 'root');

      // Requête pour récupérer toutes les données de la table certifies
      $requete = $bd->query('SELECT * FROM certifies');

      // Récupérer les données sous forme d'un tableau associatif
      $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

      // Vérifier s'il y a des résultats
      if (count($resultats) > 0){
          // Afficher l'en-tête du tableau
          echo "<table border='1'>";
          echo "<tr><th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Age</th>
                <th>Naissance</th>
                <th>Adresse mail</th>
                <th>Téléphone</th>
                <th>Année de certification</th>
                <th>Photo</th></tr>";

          // Afficher les données dans le tableau
          foreach ($resultats as $row) {
           // $row['photo'] = ()
              echo "<tr>";
                echo "<td>".$row['matricule']."</td>";
                echo "<td>".$row['nom']."</td>";
                echo "<td>".$row['prenom']."</td>";
                echo "<td>".$row['age']."</td>";
                echo "<td>".$row['naissance']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['telephone']."</td>";
                echo "<td>".$row['annee_certification']."</td>";
                echo "<td><img src='fichier/".$row['photo']."' alt='Photo de l'apprenant' width='100'></td>";
              echo "</tr>";
          }

          // Fermer la balise du tableau
          echo "</table>";
      } else {
          echo "Aucun apprenant certifié trouvé.";
      }

      // Fermer la requête et la connexion à la base de données
      $requete->closeCursor();
    ?>
</body>
</html>