<?php
require_once "../bd/bd.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../index.php");
    exit;
}

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if (!$email || !$password) {
    echo json_encode(["code"=>400, "message"=>"faltan datos"]);
    exit;
}

$pdo = getConnection();

try {

    $query = $pdo->prepare("SELECT id, password, role FROM users WHERE email = ?");
    $query->execute([$email]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        exit("Usuario no encontrado");
    }

    
    if (password_verify($password, $user['password'])){
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        if($user['role'] === 'admin'){
            header("Location: ../views/admin.php");
        }else{
            header("Location: ../dashboard/dashboard.php");
        }
        exit;
    }else{
        exit("Contraseña incorrecta");
    }

} catch (PDOException $e) {
    echo json_encode(["code"=>500, "message"=>"error en servidor"]);
}
