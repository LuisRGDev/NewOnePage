<?php
require_once "../bd/bd.php";
$pdo = getConnection();

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    die("ID invalido");
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$user){
    die("Usuario no encontrado");
}
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
                <input type="hidden" name="id" value="<?= $user['id']?>">
                <input type="text" name="email" placeholder="email" value="<?= $user['email']?>" >
                <input type="text" name="password" placeholder="Nueva contraseña">
                <input type="text" name="role" placeholder="rol" value="<?= $user['role']?>">

                <input type="submit" value="Actualizar información">
            </form>
        </div>
    </section>
    
</body>
</html>