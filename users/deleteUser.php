<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Luisrosales\NewOnePage\Database\Connection;
$pdo = Connection::get();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acceso no permitido.");
}

// if(!isset($POST['id']) || !is_numeric($_POST['id'])){
//     die("ID invalido");
// }

$id = $_POST['id'];

$sql = "DELETE FROM users
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([":id" => $id]);
        header("Location: ../index.php");
        exit;
?>