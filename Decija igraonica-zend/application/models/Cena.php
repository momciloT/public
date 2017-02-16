<?php

class Application_Model_Cena {

    protected $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function get_cene() {
        $statement = $this->db->select()->from('cena');
        return $this->db->fetchAll($statement);
    }
    
    public function insertCena($post){
      $data = array(
            "naziv" => $post['tbNaziv'],
            "cena" => $post['tbCena'],
           
        );
        return $this->db->insert('cena', $data);
    }
    
    public function updateCena($post){
         $data = array(
            "naziv" => $post['naziv'],
            "cena" => $post['opis'],            
        );
        return $this->db->update('cena',$data,"id=".$post['id']);
        
     
    }
    
     function obrisi_cenu($id) {
        return $this->db->delete("cena", "id=" . $id);
    }
    
    

}
