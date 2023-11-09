<?php

class Database {
    private $host = "localhost"; // Nombre del host de la base de datos
    private $dbname = "SILHOUETTE_db"; // Nombre de la base de datos
    private $user = "root"; // Nombre de usuario de la base de datos
    private $password = "paola200604"; // Contraseña de la base de datos
    private $charset = "utf8";

    public function conectar() {
        try {
            $conexion = "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $pdo = new PDO($conexion, $this->user, $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
    }
}


