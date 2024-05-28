<?php
    require 'funciones.php';
    require 'config/conexion.php';
    require __DIR__.'/../vendor/autoload.php';

    use Model\ActiveRecords;

    $db = conectarDB();

    ActiveRecords::setDB($db);
?>