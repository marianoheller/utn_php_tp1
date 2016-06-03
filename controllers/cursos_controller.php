<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 02/06/2016
 * Time: 14:23
 */



  class CursosController {
      public function index() {
          // all cursos en una variable
          $cursos= Curso::all();
          require_once('views/cursos/index.php');
      }

      public function show() {
          // Expect: ?controller=cursos&action=show&id=x
          // Sin id va derecho a error
          if (!isset($_GET['id']))
              return call('pages', 'error');

          // Find curso
          $curso = Curso::find($_GET['id']);
          require_once('views/cursos/show.php');
      }

      public function edit() {
          if (!isset($_GET['id']))
              return call('pages', 'error');
          if ( isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['turno']) )
              $rowsUpdated = Curso::updateWithId( $_POST['id'],$_POST['nombre'],$_POST['turno']);

          if ( $rowsUpdated == 0 )
              unset( $rowsUpdated );
          $curso = Curso::find($_GET['id']);
          require_once("views/cursos/edit.php");
      }

      public function borrar() {
          if ( isset($_GET['id']) )
              $rowsUpdated = Curso::eraseWithId( $_GET['id'] );

          require_once("views/cursos/borrar.php");
      }
  }
