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
                <th class="table-columns">SELECTOR</th>
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
                        <th class="table-data"><input type="checkbox" name="ids[]" value="<?=$row['id']?>"></th>
                        <th class="table-data"><?=htmlspecialchars( $row['id']) ?></th>
                        <th class="table-data"><?=htmlspecialchars($row['email']) ?></th>        
                        <th class="table-data"><?=htmlspecialchars($row['role']) ?></th>    
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>  
    </div>
            <div class="crud-buttons-section">
                <a class="crud-buttons-ref" href="">EDITAR</a>
                <a class="crud-buttons-ref" href="">ELIMINAR</a>
            </div>
            <a class="out-button" href="../index.php">Salir</a>
    </section>
   
</body>
</html>