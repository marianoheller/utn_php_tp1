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

    }