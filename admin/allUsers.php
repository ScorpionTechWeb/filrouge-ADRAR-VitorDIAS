<?php
//import de la connexion à la bdd
include('./db.php');    

// on récupérer tous les utilisateurs
$sql = 'SELECT * FROM users';

try {
    $pdo = new PDO($dsn, $username, $password);
    $stmt = $pdo->query($sql);

    if ($stmt === false) {
        die('Erreur');
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang='fr'>

<head>
    <title>Afficher tous les utilisateurs</title>
</head>

<body>
    <h1>Liste des utilisateurs</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Pseudo</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Type</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id_user']);
                        ?></td>
                    <td><?php echo htmlspecialchars($row['login_user']);
                        ?></td>
                    <td><?php echo htmlspecialchars($row['first_name_user']);
                        ?></td>
                    <td><?php echo htmlspecialchars($row['name_user']);
                        ?></td>
                    <td><?php echo htmlspecialchars($row['type_user']);
                        ?></td>
                    <td><a href="editUser.php?id=<?php echo htmlspecialchars($row['id_user']);
                                                    ?>">Modifier</a></td>
                    <td><a href="deleteUser.php?id=<?php echo htmlspecialchars($row['id_user']);
                                                    ?>">Supprimer</a></td>
                </tr>
            <?php endwhile;
            ?>
        </tbody>
        <a href='home.php'>Retour à l'accueil</a>
    </table>
</body>

</html>