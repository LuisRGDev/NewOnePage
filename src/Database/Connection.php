<?php

namespace Luisrosales\NewOnePage\Database;

use PDO;
use PDOException;

class Connection {
    public static function get() {
        $host = "localhost";
        $dbname = "loginfeik";
        $username = "root";
        $password = "";

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        } catch (PDOException $e) {
            echo "Error de conexion " . $e->getMessage();
            return null;
        }
    }
}
