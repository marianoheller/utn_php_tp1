<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 02/06/2016
 * Time: 14:00
 */
  require_once("datos_conexion.php");

  if (isset($_GET['controller']) && isset($_GET['action'])) {
      $controller = $_GET['controller'];
      $action     = $_GET['action'];
  } else {
      $controller = 'pages';
      $action     = 'home';
  }

  require_once('views/layout.php');
