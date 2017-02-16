<?php

class Application_Model_StanjeMapper {

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
            $this->setDbTable('Application_Model_DbTable_Stanje');
        }

        return $this->_dbTable;
    }

    public function proverazubstatus($data) {
        $adapter = $this->getDbTable()->getAdapter();
        $id_k = $data['id_k'];
        $id_z = $data['id_z'];
        $q1 = $adapter->query("SELECT * FROM pocetno_stanje WHERE id_zub =" . $id_z . " AND id_korisnik = ?", $id_k);
        return $result = $q1->fetchAll();
    }

    public function prikazslikastatuszub($data) {
        $adapter = $this->getDbTable()->getAdapter();

        $q1 = $adapter->query("SELECT id_zub,slika_zub,status FROM pocetno_stanje WHERE id_korisnik = ?", $data);
        return $result = $q1->fetchAll();
    }

    public function save($data) {

        $p1 = $data['p1'];
        $p2 = $data['p2'];
        $p3 = $data['p3'];
        $p4 = $data['p4'];
        $p5 = $data['p5'];
        $slika_zub = $p1 . $p2 . $p3 . $p4 . $p5;
        $id_zub = $data['zub'];
        $id_korisnik = $data['id_korisnik'];
        $stanje = $data['stanje'];
        $datum = new Zend_Db_Expr('NOW()');

        //$d=$datum->get('YYYY-dd-MM');

        $adapter = $this->getDbTable()->getAdapter();
        $rezultat = $adapter->query("INSERT INTO pocetno_stanje (id_zub,p1,p2,p3,p4,p5,status,datum,id_korisnik,slika_zub) VALUES ($id_zub,$p1,$p2,$p3,$p4,$p5,'$stanje',$datum,$id_korisnik,'$slika_zub')");
    }

    public function update($data) {
        $p1 = $data['p1'];
        $p2 = $data['p2'];
        $p3 = $data['p3'];
        $p4 = $data['p4'];
        $p5 = $data['p5'];
        $slika_zub = $p1 . $p2 . $p3 . $p4 . $p5;
        $id_zub = $data['zub'];
        $id_korisnik = $data['id_korisnik'];
        $stanje = $data['stanje'];
        $datum = new Zend_Db_Expr('NOW()');
        $adapter = $this->getDbTable()->getAdapter();
        $rezultat = $adapter->query("UPDATE pocetno_stanje SET p1=$p1,p2=$p2,p3=$p3,p4=$p4,p5=$p5,status='$stanje',datum=$datum,slika_zub='$slika_zub' WHERE id_zub =" . $id_zub . " AND id_korisnik = ?", $id_korisnik);
    }

}
