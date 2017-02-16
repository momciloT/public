<?php

class Application_Model_OrdinacijainfoMapper {

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
            $this->setDbTable('Application_Model_DbTable_Ordinacijainfo');
        }

        return $this->_dbTable;
    }

    public function getOrdinacija($id) {
        $adapter = $this->getDbTable()->getAdapter();
        $rezultat = $adapter->query("SELECT * FROM ordinacijainfo WHERE id_ordinacija= ?", $id);
        $resultSet = $rezultat->fetchAll();
        return $resultSet;
    }

    public function getNaplata($id) {
        $adapter = $this->getDbTable()->getAdapter();
        $rezultat = $adapter->query("SELECT naplata FROM ordinacijainfo WHERE id_ordinacija= ?", $id);
        $resultSet = $rezultat->fetchAll();
        return $resultSet;
    }

    public function getLogo($id) {
        $adapter = $this->getDbTable()->getAdapter();
        $rezultat = $adapter->query("SELECT pun_naziv,logo FROM ordinacijainfo WHERE id_ordinacija= ?", $id);
        $resultSet = $rezultat->fetchAll();
        return $resultSet;
    }

    public function promenaLogo($id, $naziv) {
        $adapter = $this->getDbTable()->getAdapter();
        $q1 = $adapter->query("UPDATE ordinacijainfo SET logo='$naziv' WHERE id_ordinacija=$id");
    }

    public function updateOrdinacija($data, $id) {
        $adapter = $this->getDbTable()->getAdapter();
        $pun_naziv = $data['pun_naziv'];
        $logo = $data['logo'];
        $broj_telefona = $data['broj_telefona'];
        $adresa = $data['adresa'];
        $naplata = $data['naplata'];
        $email = $data['email'];
        $q1 = $adapter->query("UPDATE ordinacijainfo SET email='$email', logo='$logo', pun_naziv='$pun_naziv',broj_telefona='$broj_telefona',adresa='$adresa',naplata=$naplata WHERE id_ordinacija=$id");
    }

    public function insertPodsetnik($id, $podsetnik, $datum) {
        $adapter = $this->getDbTable()->getAdapter();
        $q1 = $adapter->query("INSERT INTO podsetnik (id_ordinacija,text,datum) VALUES ($id,'$podsetnik',$datum)");
    }

    public function getPodsetnik($id) {
        $adapter = $this->getDbTable()->getAdapter();
        $rezultat = $adapter->query("SELECT * FROM podsetnik WHERE id_ordinacija=$id ORDER BY datum DESC");
        $resultSet = $rezultat->fetchAll();
        return $resultSet;
    }

}
