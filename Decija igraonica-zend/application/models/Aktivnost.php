<?php

class Application_Model_Aktivnost {

    protected $_id;
    protected $_ime;
    protected $_opis;
    protected $_slika;
    protected $_datum;
    protected $_termin;
    protected $db;
    
 

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }
    }
    public function getAktivnosti() {
        $statment=$this->db->select()->from('aktivnost');
        return $this->db->fetchAll($statment);
    }
    
    public function getAktivnost($id) {
        $statment=$this->db->select()->from('aktivnost')->where('id='.$id);
        $result=$this->db->fetchRow($statment);
         
        return $result;
    }
    public function updateAktivnost($post) {
         $datum0 = new Zend_Date();
       $datum3 = $datum0->get('YYYY-MM-dd');
         $data = array(
            "ime" => $post['naziv'],
            "opis" => $post['opis'],
            "termin" => $post['termin'],
            "datum" => $datum3,
        );
        return $this->db->update('aktivnost',$data,"id=".$post['id']);
    }
    
    public function insertAktivnost($post) {
         $datum0 = new Zend_Date();
       $datum3 = $datum0->get('YYYY-MM-dd');
         $data = array(
            "ime" => $post['tbNaziv'],
            "opis" => $post['tbOpis'],
             "datum" => $datum3,
            "termin" => $post['tbTermin'],
        );
        return $this->db->insert('aktivnost', $data);
    }
    
     function obrisi_aktivnost($id) {
        return $this->db->delete("aktivnost", "id=" . $id);
    }
    

}
