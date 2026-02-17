<?php
require_once "../bd/bd.php";

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

    $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $query->execute([':email' => $email]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo json_encode(["code"=>401, "message"=>"credenciales invalidas"]);
        exit;
    }

    
    if ($password !== $user['password']) {
        echo json_encode(["code"=>401, "message"=>"credenciales invalidas"]);
        exit;
    }

    header("Location: ../dashboard/dashboard.php");
    exit;

} catch (PDOException $e) {
    echo json_encode(["code"=>500, "message"=>"error en servidor"]);
}
