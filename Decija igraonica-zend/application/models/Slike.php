<?php

class Application_Model_Slike {

    protected $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function unesi_sliku($img, $id) {
        if ($id['select_aktivnost'] == "0") {
            return "Morate izabrati aktivnost";
        } else {
            $data = array(
                "id_aktivnost" => $id['select_aktivnost'],
                "putanja" => "/img/" . $img,
            );

           $f=$this->db->insert('slike', $data);
           if($f!='0')
           {
           return "Uspešno ste dodali sliku";
           }
        }
    }

    public function getslike($id) {
        $upit = $this->db->select()->from('slike')->where('id_aktivnost=' . $id);
        return $result = $this->db->fetchAll($upit);
    }

    public function getslikesve() {
        $upit = $this->db->select()->from('slike');
        return $result = $this->db->fetchAll($upit);
    }

    function obrisi_sliku($id) {


        $info = $this->get_info_slike($id);

        unlink("/img/" . $info['slika']);

        return $this->db->delete("slike", "id=" . $id);
    }

    function get_info_slike($id) {
        $statement = $this->db->select()->from('slike')->where('id=' . $id);

        return $this->db->fetchRow($statement);
    }

}
