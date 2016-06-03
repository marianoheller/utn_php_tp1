<?php
/**
 * Created by PhpStorm.
 * User: marianoheller
 * Date: 02/06/2016
 * Time: 14:32
 */

require_once("Db.php");

class Curso {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $nombre;
    public $turno;

    public function __construct($id, $nombre, $turno) {
        $this->id      = $id;
        $this->nombre  = $nombre;
        $this->turno = $turno;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM curso');

        foreach($req->fetchAll() as $curso) {
            $list[] = new Curso($curso['id'], $curso['nombre'], $curso['turno']);
        }

        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
        //checkeo q sea un int
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM curso WHERE id = :id');

        $req->execute(array('id' => $id));
        $curso = $req->fetch();

        return new Curso($curso['id'], $curso['nombre'], $curso['turno']);
    }

    public static function updateWithId($id,$nombre,$turno) {
        $db = Db::getInstance();
        //checkeo q sea un int
        $id = intval($id);
        $req = $db->prepare("UPDATE curso SET nombre=:nombre, turno=:turno WHERE id= :id");

        $req->execute(array(    'nombre' => $nombre,
                                'turno' => $turno,
                                'id' => $id));
        $rowsUpdated = $req->rowCount();
        return $rowsUpdated;
    }

    public static function insertCurso($nombre,$turno) {
        $db = Db::getInstance();
        $req = $db->prepare("INSERT into curso (nombre,turno) values (:nombre,:turno)");

        $req->execute(array( 'nombre' => $nombre, 'turno' => $turno) );
    }

    public static function eraseWithId($id) {
        $db = Db::getInstance();
        //checkeo q sea un int
        $id = intval($id);
        $req = $db->prepare("DELETE FROM curso WHERE id=$id");

        $req->execute(array('id' => $id));
        $rowsUpdated = $req->rowCount();
        return $rowsUpdated;
    }
}
