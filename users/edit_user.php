<?php
require_once "../bd/bd.php";
$pdo = getConnection();

$id = $_POST['id'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "UPDATE  users SET email='$email', password='$password', role='$role' WHERE id='$id'";

try{
    $query = $pdo->prepare($sql);
$query->execute([":id" => $id,
                 ":email" => $email,
                 ":password" => $password]);

                 header("Location: ../index.php");
}catch(PDOException $e){
    if($e->errorInfo[1] === 1062){
        die("El usuario ha sido editado exitosamente");
    }
    die("Error en la base de datos.");
}
?>