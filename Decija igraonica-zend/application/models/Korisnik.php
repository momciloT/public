<?php

class Application_Model_Korisnik
{
 protected $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }
    }
    public function get_korisnici() {
        $sql=  $this->db->select()->from('korisnik');
        return $this->db->fetchAll($sql);
        
    }
    
    function obrisi_korisnika($id) {
        return $this->db->delete("korisnik", "id=" . $id);
    }


}

