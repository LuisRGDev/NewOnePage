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

 $query = $pdo->query("SELECT id, email, password, role FROM users");
$user = $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de usuarios</title>
</head>
<body>
    <h1 class="crud-title">CRUD de usuarios</h1>
    <div class="users-table">
        <table class="table-crud">
            <thead>
                <th class="table-columns">Id</th>
                <th class="table-columns">Email</th>
                <th class="table-columns">Password</th>
                <th class="table-columns">Rol</th>
            </thead>
            <tbody>
                <?php
                $query = $pdo->query("SELECT id, email, role FROM users");
                    $users = $query->fetchAll(PDO::FETCH_ASSOC);

                foreach ($users as $row):
                    ?>
                    <tr>
                        <th class="table-data"><?=htmlspecialchars( $row['id']) ?></th>
                        <th class="table-data"><?=htmlspecialchars($row['email']) ?></th>        
                        <th class="table-data"><?=htmlspecialchars($row['role']) ?></th>    
                    </tr>
                <?php endforeach; ?>
                <th class="crud-buttons"> <a href="">Editar</a> </th>
                <th class="crud-buttons"><a href="">Eliminar</a></th>
            </tbody>
        </table>
    </div>
</body>
</html>