<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 02/06/2016
 * Time: 14:10
 */
  class PagesController {
      public function home() {
          $first_name = 'Mariano';
          $last_name  = 'Heller';
          require_once('views/pages/home.php');
      }

      public function error() {
          require_once('views/pages/error.php');
      }
  }