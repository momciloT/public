<?php

class Application_Model_Signin {

    protected $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function sigin_user($post) {
        $data = array(
            "ime" => $post['tbKorisnickoImeR'],
            "email" => $post['tbEmailR'],
            "lozinka" => md5($post['tbLozinkaR']),
            "uloga" => "0",
        );
        return $this->db->insert('korisnik', $data);
    }

}
