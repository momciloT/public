<?php

class Application_Model_PacijentMapper {

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

    public function save(Application_Model_Pacijent $a) {
        $data = array(
            'id' => $a->get_id(),
            'ime' => $a->get_ime(),
            'prezime' => $a->get_prezime(),
            'datum_rodjenja' => $a->get_datum_rodjenja(),
            'adresa' => $a->get_adresa(),
            'mobilni' => $a->get_mobilni(),
            'upozorenja' => $a->get_upozorenja(),
            'oboljenja' => $a->get_oboljenja(),
            'id_ordinacija' => $a->get_id_ordinacija(),
            'email' => $a->get_email(),
        );
        if (null === ($id = $a->get_id())) {
            unset($data['id']);
            return $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id=?' => $id));
        }
    }

    public function getPacijetni($id) {
        $adapter = $this->getDbTable()->getAdapter();
        $rezultat = $adapter->query("SELECT * FROM pacijent WHERE id_ordinacija = ?", $id);
        $resultSet = $rezultat->fetchAll();

        $pacijenti = array();

        foreach ($resultSet as $row) {
            $pacijent = new Application_Model_Pacijent();
            $pacijent->set_id($row['id']);
            $pacijent->set_ime($row['ime']);
            $pacijent->set_prezime($row['prezime']);
            $pacijent->set_adresa($row['adresa']);
            $pacijent->set_mobilni($row['mobilni']);
            $pacijent->set_slika($row['slika']);
            $pacijenti[] = $pacijent;
        }

        return $pacijenti;
    }

    public function nadjipacijeta($pod, $ido) {
        $adapter = $this->getDbTable()->getAdapter();
        $q1 = $adapter->query("SELECT id,ime,prezime,datum_rodjenja FROM pacijent WHERE id_ordinacija=$ido AND ( LOWER(ime) LIKE '%$pod%' OR LOWER(prezime) LIKE '%$pod%')");
        return $rezultat = $q1->fetchAll();
    }

    public function proveraPacijenta($id, $ido) {
        $adapter = $this->getDbTable()->getAdapter();
        $rezultat = $adapter->query("SELECT id,id_ordinacija FROM pacijent WHERE id_ordinacija =" . $ido . " AND id = ?", $id);
        $r = $rezultat->fetchColumn();
        if ($r != '') {
            $rezultat2 = $adapter->query("SELECT * FROM pacijent WHERE id=?", $id);
            //$rezultat2->fetchAll();
            return $result = $rezultat2->fetchAll();
        } else {
            return $r;
        }
    }

    public function promenaSlika($id, $naziv) {
        $adapter = $this->getDbTable()->getAdapter();
        $q1 = $adapter->query("UPDATE pacijent SET slika='$naziv' WHERE id=$id");
    }

    public function odjaviPacijenta($id, $rand) {
        $adapter = $this->getDbTable()->getAdapter();
        $q1 = $adapter->query("UPDATE pacijent SET odjava_kod='$rand' WHERE id=$id");
    }

    public function prijaviPacijenta($id, $kod) {
        $adapter = $this->getDbTable()->getAdapter();
        $q1 = $adapter->query("UPDATE pacijent SET id_ordinacija=$id,odjava_kod='' WHERE odjava_kod='$kod'");
        return $q1->rowCount();
    }

    public function updatePacijent($data, $id) {
        $adapter = $this->getDbTable()->getAdapter();
        $ime = $data['tbImePacijenta'];
        $prezime  = $data['tbPrezimePacijenta'];
        $datum_rodjenja = $data['tbDatum'];
        $adresa = $data['tbAdresa'];
        $mobilni = $data['tbMobilni'];
        $upozorenja = $data['tbNapomena'];
        $oboljenja = $data['tbOboljenja'];
        $email = $data['tbEmail'];
        $q1 = $adapter->query("UPDATE pacijent SET ime='$ime',prezime='$prezime',datum_rodjenja='$datum_rodjenja',adresa='$adresa',mobilni=$mobilni,upozorenja='$upozorenja',oboljenja='$oboljenja',email='$email' WHERE id='$id'");
        return $q1->rowCount();
    }

}
