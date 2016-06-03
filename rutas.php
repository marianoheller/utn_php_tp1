<?php
/**
 * Created by PhpStorm.
 * User: marianoheller
 * Date: 02/06/2016
 * Time: 14:07
 */



  function call($controller, $action) {
      // get controller
      require_once('controllers/' . $controller . '_controller.php');
      switch($controller) {
          case 'pages':
              $controller = new PagesController();
              break;
          case 'cursos':
              require_once('models/curso.php');
              $controller = new CursosController();
              break;

      }
      // and call the action
      $controller->{ $action }();
  }



  // lista de controladores y sus actions posibles (para saber cuando hay un error)
  $controllers = array( 'pages' => ['home', 'error'],
                        'cursos' => ['index','show','edit','borrar','agregar']);

  // check a ver si existe el controlador y la accion
  // si alguien quiere routear mal, salta error
  if (array_key_exists($controller, $controllers)) {
      if (in_array($action, $controllers[$controller])) {
          call($controller, $action);
      } else {
          call('pages', 'error');
      }
  } else {
      call('pages', 'error');
  }
