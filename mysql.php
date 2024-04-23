<?php

$db_config = array(
    'host' => 'localhost',
    'basedatos' => 'nombre_base_datos',
    'usuario' => 'root',
    'pass' => 'contra_base_datos'
);

function conexion($db_config){
    try {
        $dsn = "mysql:host=" . $db_config['host'] . ";dbname=" . $db_config['basedatos'].";charset=utf8mb4";
        $pdo = new PDO($dsn, $db_config['usuario'], $db_config['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($pdo) {
            return $pdo;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    } finally {
        if ($pdo) {
            $pdo = null;
        }
    }
}


?>