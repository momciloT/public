<?php

class Application_Model_Rad
{
    protected $_id;
    protected $_opis;
    protected $_id_ordinacija;
    
    public function _set($name, $value) {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Svojstvo za RAD nije definisano');
        }
        $this->$method($value);
    }

    public function _get($name) {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Svojstvo za RAD nije definisano');
        }
    }

    public function setOptions(array $options) {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }
    
    function get_id() {
        return $this->_id;
    }

    function get_opis() {
        return $this->_opis;
    }

    function get_id_ordinacija() {
        return $this->_id_ordinacija;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_opis($_opis) {
        $this->_opis = $_opis;
    }

    function set_id_ordinacija($_id_ordinacija) {
        $this->_id_ordinacija = $_id_ordinacija;
    }




}

