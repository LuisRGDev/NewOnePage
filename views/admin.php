<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}
?>
<?php
require_once "../bd/bd.php";
$pdo = getConnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de usuarios</title>
    <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>
    <section class="section-crud">
    <h1 class="crud-title">CRUD DE USUARIOS</h1>
    <div class="users-table">
        <table class="table-crud">
            <thead>
                <th class="table-columns">ID</th>
                <th class="table-columns">EMAIL</th>
                <!-- <th class="table-columns">Password</th> -->
                <th class="table-columns">ROL</th>
            </thead>
            <tbody>
                <?php
                $query = $pdo->query("SELECT id, email, role FROM users");
                $user = $query->fetchAll(PDO::FETCH_ASSOC);

                foreach ($user as $row):
                    ?>
                    <tr>
                        <th class="table-data"><?=htmlspecialchars( $row['id']) ?></th>
                        <th class="table-data"><?=htmlspecialchars($row['email']) ?></th>        
                        <th class="table-data"><?=htmlspecialchars($row['role']) ?></th>    
                        <th class="table-data--button"><a class="crud-buttons--update" href="update.php?id=<?= $row['id'] ?>">EDITAR</a></th>
                        <!-- <th class="table-data--button"> <a class="crud-buttons--delete" href="../users/deleteUser.php?id=<?= $row['id'] ?>">ELIMINAR</a></th> -->
                       <th class="table-data--button"><form class="form--delete" action="../users/deleteUser.php" method="POST">
                            <input type="hidden" name="id" value="<?=$row['id'] ?>">
                            <button class="button--deleteuser" type="submit" onclick="return confirm('¿Eliminar usuario?')">
                                ELIMINAR
                            </button>
                        </form></th> 
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>  
    </div>
            <a class="out-button" href="../index.php">SALIR</a>
    </section>
   
</body>
</html>