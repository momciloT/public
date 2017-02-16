<?php

class Application_Model_Ordinacijainfo {

    protected $_id;
    protected $_id_ordinacija;
    protected $_pun_naziv;
    protected $_broj_telefona;
    protected $_adresa;
    protected $_logo;
    
    public function _set($name, $value) {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Svojstvo za ordinaciju nije definisano');
        }
        $this->$method($value);
    }

    public function _get($name) {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Svojstvo za ordinaciju nije definisano');
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

    function get_id_ordinacija() {
        return $this->_id_ordinacija;
    }

    function set_id_ordinacija($_id_ordinacija) {
        $this->_id_ordinacija = $_id_ordinacija;
    }

    function get_id() {
        return $this->_id;
    }

    function get_pun_naziv() {
        return $this->_pun_naziv;
    }

    function get_broj_telefona() {
        return $this->_broj_telefona;
    }

    function get_adresa() {
        return $this->_adresa;
    }

    function get_logo() {
        return $this->_logo;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_pun_naziv($_pun_naziv) {
        $this->_pun_naziv = $_pun_naziv;
    }

    function set_broj_telefona($_broj_telefona) {
        $this->_broj_telefona = $_broj_telefona;
    }

    function set_adresa($_adresa) {
        $this->_adresa = $_adresa;
    }

    function set_logo($_logo) {
        $this->_logo = $_logo;
    }

}
