<?php

class Application_Model_RadoviMapper {

    protected $_dbTable;

    public function setDbTable($dbTable) {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception("Nepostojeci table gateway");
        }
        $this->_dbTable = $dbTable;

        return $this;
    }

    public function getDbTable() {
        if (null == $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Pacijent');
        }

        return $this->_dbTable;
    }

    public function getRadoviFull($id) {
        $adapter = $this->getDbTable()->getAdapter();
        $rezultat = $adapter->query("SELECT * FROM radovi WHERE id_korisnik = ?", $id);
        $resultSet = $rezultat->fetchAll();
        return $resultSet;
    }

    public function getRadovi($id) {
        $adapter = $this->getDbTable()->getAdapter();
        $rezultat = $adapter->query("SELECT * FROM radovi WHERE naplata=1 AND id_korisnik = ?", $id);
        $resultSet = $rezultat->fetchAll();
        return $resultSet;
    }

    public function getOperacija($data) {
        $id = $data['id'];
        $adapter = $this->getDbTable()->getAdapter();
        $rezultat = $adapter->query("SELECT * FROM radovi WHERE id = ?", $id);
        return $resultSet = $rezultat->fetchAll();
    }

    public function brojRadova($id, $data) {
        $adapter = $this->getDbTable()->getAdapter();
        $brop = array();
        foreach ($data as $vrednost => $value) {
            $q1 = $adapter->query("SELECT COUNT(id) FROM radovi WHERE datum = '$value' AND id_ordinacija=$id");
            $brop[] = $q1->fetchColumn();
        }
        return $brop;
    }

    public function saveRad($data, $idordinacija) {
        $p1 = $data['p1'];
        $p2 = $data['p2'];
        $p3 = $data['p3'];
        $p4 = $data['p4'];
        $p5 = $data['p5'];
        $id_zub = $data['zub'];
        $id_korisnik = $data['id_korisnik'];
        $stanje = $data['stanje'];
        $rad = $data['rad'];
        $opis = $data['opis'];
        $naplata = $data['naplata'];

        $datum = new Zend_Db_Expr('NOW()');

        $adapter = $this->getDbTable()->getAdapter();
        $rezultat = $adapter->query("INSERT INTO radovi (id_zub,p1,p2,p3,p4,p5,status,datum,id_korisnik,rad,id_ordinacija,opis,naplata) VALUES ($id_zub,$p1,$p2,$p3,$p4,$p5,'$stanje',$datum,$id_korisnik,$rad,$idordinacija,'$opis',$naplata)");

        if ($rezultat) {
            $q2 = $adapter->query("SELECT id FROM stanje_iz_operacija WHERE id_korisnik=$id_korisnik AND id_zub=?", $id_zub);
            $r1 = $q2->fetchAll();
            if ($r1 == NULL) {
                $q1 = $adapter->query("INSERT INTO stanje_iz_operacija (p1,p2,p3,p4,p5,stanje,id_korisnik,id_zub) VALUES ($p1,$p2,$p3,$p4,$p5,'$stanje',$id_korisnik,$id_zub)");
            } else {

                if ($p1 != 0) {
                    $q3 = $adapter->query("UPDATE stanje_iz_operacija SET p1=$p1 WHERE id_korisnik=$id_korisnik AND id_zub=?", $id_zub);
                }
                if ($p2 != 0) {
                    $q4 = $adapter->query("UPDATE stanje_iz_operacija SET p2=$p2 WHERE id_korisnik=$id_korisnik AND id_zub=?", $id_zub);
                }
                if ($p3 != 0) {
                    $q5 = $adapter->query("UPDATE stanje_iz_operacija SET p3=$p3 WHERE id_korisnik=$id_korisnik AND id_zub=?", $id_zub);
                }
                if ($p4 != 0) {
                    $q6 = $adapter->query("UPDATE stanje_iz_operacija SET p4=$p4 WHERE id_korisnik=$id_korisnik AND id_zub=?", $id_zub);
                }
                if ($p5 != 0) {
                    $q6 = $adapter->query("UPDATE stanje_iz_operacija SET p5=$p5 WHERE id_korisnik=$id_korisnik AND id_zub=?", $id_zub);
                }
                if ($stanje != '0') {
                    $q7 = $adapter->query("UPDATE stanje_iz_operacija SET stanje='$stanje' WHERE id_korisnik=$id_korisnik AND id_zub=?", $id_zub);
                }
            }
        }
    }

    /*
     *

     * 
     */

    public function obrisiSanaciju($id) {
        $adapter = $this->getDbTable()->getAdapter();
        $rezultat = $adapter->query("DELETE FROM radovi WHERE id=?", $id);
    }

    public function getUkupno($id, $mesec) {
        $adapter = $this->getDbTable()->getAdapter();
        $q1 = $adapter->query("SELECT COUNT(id) FROM radovi WHERE datum LIKE '%-$mesec-%' AND id_ordinacija=$id");
        return $q1->fetchColumn();
    }

    public function getPojedinacno($id, $mesec) {
        $adapter = $this->getDbTable()->getAdapter();
        $brop = array();
        $q1 = $adapter->query("SELECT COUNT(id) FROM radovi WHERE datum LIKE '%-$mesec-%' AND rad=1 AND id_ordinacija=$id");
        $q2 = $adapter->query("SELECT COUNT(id) FROM radovi WHERE datum LIKE '%-$mesec-%' AND rad=2 AND id_ordinacija=$id");
        $q3 = $adapter->query("SELECT COUNT(id) FROM radovi WHERE datum LIKE '%-$mesec-%' AND rad=3 AND id_ordinacija=$id");
        $q4 = $adapter->query("SELECT COUNT(id) FROM radovi WHERE datum LIKE '%-$mesec-%' AND rad=4 AND id_ordinacija=$id");
        $q5 = $adapter->query("SELECT COUNT(id) FROM radovi WHERE datum LIKE '%-$mesec-%' AND rad=5 AND id_ordinacija=$id");
        $brop[] = $q1->fetchColumn();
        $brop[] = $q2->fetchColumn();
        $brop[] = $q3->fetchColumn();
        $brop[] = $q4->fetchColumn();
        $brop[] = $q5->fetchColumn();
        return $brop;
    }

}
