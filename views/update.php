<?php
require_once "../bd/bd.php";
$pdo = getConnection();

$id=$_GET['id'];

$query = $pdo->query("SELECT * FROM users WHERE id=?");
$user = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
</head>
<body>
    <section class="update-user--body">
        <div class="update-user--form">
            <form action="../users/edit_user.php" method="POST">
                <h1>Editar usuario</h1>
                <input type="hidden" name="id" value="<?= $row['id']?>">
                <input type="text" name="email" placeholder="email" value="<?= $row['email']?>" >
                <input type="text" name="password" placeholder="Contraseña" value="<?= $row['password'] ?>">
                <input type="text" name="role" placeholder="rol" value="<?= $row['role']?>">

                <input type="submit" value="Actualizar información">
            </form>
        </div>
    </section>
    
</body>
</html>