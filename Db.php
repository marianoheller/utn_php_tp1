<?php

/**
 * Created by PhpStorm.
 * User: marianoheller
 * Date: 02/06/2016
 * Time: 13:55
 */

require("datos_conexion.php");

class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO("mysql:host=".SERVIDOR.";dbname=".BASE_DATOS, USUARIO, PASSWD, $pdo_options);
        }
        return self::$instance;
    }
}
