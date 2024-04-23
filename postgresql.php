<?php

$db_config = array(
    'host' => 'localhost',
    'port' => '5432',
    'basedatos' => 'nombre_base_datos',
    'usuario' => 'postgres',
    'pass' => 'contra_base_datos'
);


function conexion($db_config){
    try {
        $dsn = "pgsql:host=" . $db_config['host'] . " port=" . $db_config['port'] . " dbname=" . $db_config['basedatos'] . " options='--client_encoding=UTF8'";
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