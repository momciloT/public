<?php

class Application_Model_Zakazivanje {

    private $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
    }

    /*  public function datum() {
      $datumi = array();
      for ($i = 0; $i <= 6; $i++) {
      $datum = new Zend_Date();
      $datum->add($i, Zend_Date::DAY);
      $datum2 = $datum->get('YYYY-MM-dd');
      $datumi[] = $datum2;
      }

      return $datumi;
      } */

    public function datum() {
        $datumi = array();

        $datum0 = new Zend_Date();
        $datum2 = $datum0->get(Zend_Date::WEEKDAY_8601);

        if ($datum2 < 6) {

            $datum2 = 5 - $datum2;
            for ($i = 0; $i <= 2; $i++) {

                $datum = new Zend_Date();
                $datum->add($datum2, Zend_Date::DAY);
                $datum3 = $datum->get('YYYY-MM-dd');
                $datumi[] = $datum3;
                $datum2++;
            }
        } else {
            $datum2 = 7 - $datum2;
            for ($i = 0; $i <= $datum2; $i++) {
                $datum = new Zend_Date();
                $datum->add($i, Zend_Date::DAY);
                $datum3 = $datum->get('YYYY-MM-dd');
                $datumi[] = $datum3;
            }
        }

        return $datumi;
    }

    public function rezervisiTermin($post) {
        if (($post['select_godine'] == '0') || ($post['select_datum'] == '0') || ($post['select_termin'] == '0')) {
            return "Morate izabrati sve";
        } else {
            $upit = $this->db->select()->from('rodjendan')->where('datum="' . $post['select_datum'] . '" AND termin=' . $post['select_termin']);
            $result = $this->db->fetchRow($upit);
            if ($result != NULL) {
                return 'Pokusajte ponovo!';
            } else {
                $data = array(
                    "imeS" => $post['tbIme'],
                    "telefonS" => $post['tbTelefon'],
                    "emailS" => $post['tbEmail'],
                    "godineS" => $post['select_godine'],
                    "datum" => $post['select_datum'],
                    "termin" => $post['select_termin'],
                );
                return $this->db->insert('rodjendan', $data);
            }
        }
    }

    public function getrezervacije() {
        $upit = $this->db->select()->from('rodjendan');
        return $this->db->fetchAll($upit);
    }

    function obrisi_rezervaciju($id) {
        return $this->db->delete("rodjendan", "id=" . $id);
    }

}
