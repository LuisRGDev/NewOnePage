<?php
require_once "../bd/bd.php";
$pdo = getConnection();

$id=$_GET['id'];

$query = $pdo->query("SELECT * FROM users WHERE id=?");
$user = $query->fetch(PDO::FETCH_ASSOC);


?>