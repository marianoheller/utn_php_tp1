<?php
/**
 * Created by PhpStorm.
 * User: marianoheller
 * Date: 02/06/2016
 * Time: 14:32
 */

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
            $list[] = new Curso($curso['id'], $curso['nombre'], $curso['turn']);
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
}