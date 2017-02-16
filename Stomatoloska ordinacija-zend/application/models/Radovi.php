<?php

class Application_Model_Radovi
{
    protected $_id;
    protected $_id_korisnik;
    protected $_id_ordinacija;
    protected $_id_zub;
    protected $_p1;
    protected $_p2;
    protected $_p3;
    protected $_p4;
    protected $_p5;
    protected $_opis;
    protected $_datum;
    
    public function _set($name, $value) {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Svojstvo nije definisano');
        }
        $this->$method($value);
    }

    public function _get($name) {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Svojstvo nije definisano');
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

    function get_id_korisnik() {
        return $this->_id_korisnik;
    }

    function get_id_ordinacija() {
        return $this->_id_ordinacija;
    }

    function get_id_zub() {
        return $this->_id_zub;
    }

    function get_p1() {
        return $this->_p1;
    }

    function get_p2() {
        return $this->_p2;
    }

    function get_p3() {
        return $this->_p3;
    }

    function get_p4() {
        return $this->_p4;
    }

    function get_p5() {
        return $this->_p5;
    }

    function get_opis() {
        return $this->_opis;
    }

    function get_datum() {
        return $this->_datum;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_id_korisnik($_id_korisnik) {
        $this->_id_korisnik = $_id_korisnik;
    }

    function set_id_ordinacija($_id_ordinacija) {
        $this->_id_ordinacija = $_id_ordinacija;
    }

    function set_id_zub($_id_zub) {
        $this->_id_zub = $_id_zub;
    }

    function set_p1($_p1) {
        $this->_p1 = $_p1;
    }

    function set_p2($_p2) {
        $this->_p2 = $_p2;
    }

    function set_p3($_p3) {
        $this->_p3 = $_p3;
    }

    function set_p4($_p4) {
        $this->_p4 = $_p4;
    }

    function set_p5($_p5) {
        $this->_p5 = $_p5;
    }

    function set_opis($_opis) {
        $this->_opis = $_opis;
    }

    function set_datum($_datum) {
        $this->_datum = $_datum;
    }


    

}

