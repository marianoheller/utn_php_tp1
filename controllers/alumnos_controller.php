<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 03/06/2016
 * Time: 17:42
 */
    class AlumnosController {
        public function index() {
            // all alumnos en una variable
            $alumnos = Alumno::all();

            require_once('views/alumnos/index.php');
        }

        public function show() {
            // Expect: ?controller=alumnos&action=show&id=x
            // Sin id va derecho a error
            if (!isset($_GET['id']))
                return call('pages', 'error');

            // Find curso
            $alumno = Alumno::find($_GET['id']);
            require_once('views/alumnos/show.php');
        }


        public function edit() {
            if (!isset($_GET['id']))
                return call('pages', 'error');
            if ( isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['edad']) )
                $rowsUpdated = Alumno::updateWithId( $_POST['id'],$_POST['nombre'],$_POST['edad']);

            if ( isset($rowsUpdated) && $rowsUpdated == 0 )
                unset( $rowsUpdated );
            $alumno = Alumno::find($_GET['id']);
            require_once("views/alumnos/edit.php");
        }

        public function borrar() {
            if ( isset($_GET['id']) )
                $rowsUpdated = Alumno::eraseWithId( $_GET['id'] );

            require_once("views/alumnos/borrar.php");
        }
    }