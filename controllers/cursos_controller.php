<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 02/06/2016
 * Time: 14:23
 */

require_once("models\alumno.php");

  class CursosController {
      public function index() {

          $q="";
          $itemsPorPag = 3;
          $inicio = 0;
          if (isset($_GET["q"])) {
              $q=$_GET["q"];
              $inicio=0;
          }
          if (isset($_GET["p"])) {
              $inicio = ($_GET["p"]-1)*3;
          }
          $pagina = ($inicio / 3)+1;
          $paginaAnterior = $pagina - 1;
          $paginaSiguiente = $pagina + 1;

          $cursos= Curso::allWithPagination($inicio,$itemsPorPag);
          $cantDeCursos = Curso::count();

          // Get cant alumnos por curso
          $cantAlumnos = [];
          /** @var Curso $curso */
          foreach($cursos as $curso) {
              $cantAlumnos[strval($curso->id)] = Alumno::countAlumnosOnCurso($curso->id);
          }
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

          if ( isset($rowsUpdated) && $rowsUpdated == 0 )
              unset( $rowsUpdated );
          $curso = Curso::find($_GET['id']);
          require_once("views/cursos/edit.php");
      }

      public function agregar() {
          if ( isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['turno']) ) {
              $return = Curso::insertCurso($_POST['nombre'], $_POST['turno']);
              $this->index();
          }
          else
            require_once("views/cursos/agregar.php");
      }

      public function borrar() {
          if ( isset($_GET['id']) )
              $rowsUpdated = Curso::eraseWithId( $_GET['id'] );

          require_once("views/cursos/borrar.php");
      }
  }
