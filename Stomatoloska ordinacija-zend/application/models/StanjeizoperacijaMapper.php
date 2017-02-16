<?php

class Application_Model_StanjeizoperacijaMapper
{
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
            $this->setDbTable('Application_Model_DbTable_Stanjeizoperacija');
        }

        return $this->_dbTable;
    }
    
    public function getStanjaIzOperacija($id_korisnik) {
        $adapter = $this->getDbTable()->getAdapter();       
        $q1=$adapter->query('SELECT id_zub,p1,p2,p3,p4,p5,stanje FROM stanje_iz_operacija WHERE id_korisnik=?',$id_korisnik);
        return $r=$q1->fetchAll();
    }

}

