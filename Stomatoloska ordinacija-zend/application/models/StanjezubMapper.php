<?php

class Application_Model_StanjezubMapper {

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
            $this->setDbTable('Application_Model_DbTable_Zubstanje');
        }

        return $this->_dbTable;
    }

    public function getStanjeOpis($id) {
        $adapter = $this->getDbTable()->getAdapter();
        $q1 = $adapter->query("SELECT * FROM stanje WHERE id = ?", $id);
        $rez = $q1->fetchAll();
        return $rez;
    }

    public function getStanja() {
        $adapter = $this->getDbTable()->getAdapter();
        $q1 = $adapter->query("SELECT * FROM stanje");
        $rez = $q1->fetchAll();
        return $rez;
    }

}
