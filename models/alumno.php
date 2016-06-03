<?php
/**
 * Created by PhpStorm.
 * User: marianoheller
 * Date: 02/06/2016
 * Time: 14:32
 */

require_once("Db.php");

class Alumno {
    public $id;
    public $nombre;
    public $edad;
    public $curso_id;

    public function __construct($id, $nombre, $edad, $curso_id) {
        $this->id      = $id;
        $this->nombre  = $nombre;
        $this->edad = $edad;
        $this->curso_id = $curso_id;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM alumno');

        /** @var Alumno $alumno */
        foreach($req->fetchAll() as $alumno) {
            $list[] = new Alumno($alumno['id'], $alumno['nombre'], $alumno['edad'], $alumno['curso_id']);
        }

        return $list;
    }

    public static function countAll() {
        $db = Db::getInstance();
        $req = $db->query('SELECT COUNT(*) cantidad FROM alumno');

        $cant = $req->fetch();

        return $cant;
    }

    public static function getAlumnosOnCurso($id) {
        $list = [];
        $db = Db::getInstance();
        $req = $db->prepare('SELECT * FROM alumno WHERE curso_id = :id');
        $req->execute(array('id' => $id));

        foreach($req->fetchAll() as $alumno) {
            $list[] = new Alumno($alumno['id'], $alumno['nombre'], $alumno['edad'], $alumno['curso_id']);
        }
        return $list;
    }

    public static function countAlumnosOnCurso($id) {
        $db = Db::getInstance();
        //checkeo q sea un int
        $id = intval($id);
        $req = $db->prepare('SELECT COUNT(*) cant FROM alumno WHERE curso_id = :id');

        $req->execute(array('id' => $id));
        $cant = $req->fetch();

        return $cant["cant"];
    }

    public static function find($id) {
        $db = Db::getInstance();
        //checkeo q sea un int
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM alumno WHERE id = :id');

        $req->execute(array('id' => $id));
        $alumno = $req->fetch();

        return new Alumno($alumno['id'], $alumno['nombre'], $alumno['edad'], $alumno['curso_id']);
    }

}