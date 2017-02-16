<?php

class Application_Model_Komentar
{
    protected $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function getKomentari($id) {
         $statement = $this->db->select()->from('komentari')->where('id_aktivnost='.$id);
        return $this->db->fetchAll($statement);
    }
    
    public function setKomentar($user,$post,$idAktivnost) {
        $datum = new Zend_Date();
            $datum2 = $datum->get('YYYY-MM-dd');
         $data = array(
                    "ime" => $user,
                    "text" => $post['tbPoruka'],                
                    "datum" => $datum2,
                    "id_aktivnost" => $idAktivnost,
                );
                return $this->db->insert('komentari', $data);
    }
}

