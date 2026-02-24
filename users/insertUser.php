<?php
require_once "../bd/bd.php";
$pdo = getConnection();

$id = null;
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (id, email, password) VALUES(:id, :email, :password)";

try{
    $query = $pdo->prepare($sql);
$query->execute([":id" => $id,
                 ":email" => $email,
                 ":password" => $password]);

                 header("Location: ../index.php");
}catch(PDOException $e){
    if($e->errorInfo[1] === 1062){
        die("El correo ya esta registrado");
    }
    die("Error en la base de datos.");
}

?>