<?php

class Application_Model_RadMapper {

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
            $this->setDbTable('Application_Model_DbTable_Rad');
        }

        return $this->_dbTable;
    }

    public function getRadOpis($id) {
        $adapter = $this->getDbTable()->getAdapter();
        $q1 = $adapter->query("SELECT * FROM rad WHERE id = ?", $id);
        $rez=$q1->fetchAll();
        return $rez;
    }
    public function getRadovi($ido){
        $adapter=  $this->getDbTable()->getAdapter();
        $q1=$adapter->query("SELECT * FROM rad WHERE id_ordinacija=0 OR id_ordinacija=?",$ido);
        $rez=$q1->fetchAll();
        return $rez;
    }

}
