<?php
require_once "../bd/bd.php";
$pdo = getConnection();

$id = $_POST['id'];
$email = trim($_POST['email']);
$role = $_POST['role'];
$passwordInput = $_POST['password'];

try {

    if (!empty($passwordInput)) {
        $password = password_hash($passwordInput, PASSWORD_DEFAULT);

        $sql = "UPDATE users 
                SET email = :email,
                    password = :password,
                    role = :role
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":email" => $email,
            ":password" => $password,
            ":role" => $role,
            ":id" => $id
        ]);

    } else {

        $sql = "UPDATE users 
                SET email = :email,
                    role = :role
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":email" => $email,
            ":role" => $role,
            ":id" => $id
        ]);
    }

    header("Location: ../index.php");
    exit;

} catch (PDOException $e) {

    if ($e->errorInfo[1] == 1062) {
        die("El correo ya está registrado.");
    }

    die("Error en la base de datos.");
}
?>