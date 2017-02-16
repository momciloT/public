<?php

class Application_Model_Pacijent {

    protected $_id;
    protected $_id_ordinacija;
    protected $_ime;
    protected $_prezime;
    protected $_datum_rodjenja;
    protected $_adresa;
    protected $_mobilni;
    protected $_upozorenja;
    protected $_oboljenja;
    protected $_email;
    protected $_slika;

    public function _set($name, $value) {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Svojstvo za Pacijent nije definisano');
        }
        $this->$method($value);
    }

    public function _get($name) {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Svojstvo za Pacijent nije definisano');
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

    function get_ime() {
        return $this->_ime;
    }

    function get_prezime() {
        return $this->_prezime;
    }

    function get_datum_rodjenja() {
        return $this->_datum_rodjenja;
    }

    function get_adresa() {
        return $this->_adresa;
    }

    function get_mobilni() {
        return $this->_mobilni;
    }

    function get_upozorenja() {
        return $this->_upozorenja;
    }

    function get_oboljenja() {
        return $this->_oboljenja;
    }

    function set_id_ordinacija($_id_ordinacija) {
        $this->_id_ordinacija = $_id_ordinacija;
    }

    function set_ime($_ime) {
        $this->_ime = $_ime;
    }

    function set_prezime($_prezime) {
        $this->_prezime = $_prezime;
    }

    function set_datum_rodjenja($_datum_rodjenja) {
        $this->_datum_rodjenja = $_datum_rodjenja;
    }

    function set_adresa($_adresa) {
        $this->_adresa = $_adresa;
    }

    function set_mobilni($_mobilni) {
        $this->_mobilni = $_mobilni;
    }

    function set_upozorenja($_upozorenja) {
        $this->_upozorenja = $_upozorenja;
    }

    function set_oboljenja($_oboljenja) {
        $this->_oboljenja = $_oboljenja;
    }

    function get_id() {
        return $this->_id;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }
    
     function get_email() {
        return $this->_email;
    }

    function set_email($_email) {
        $this->_email = $_email;
    }
    function get_slika() {
        return $this->_slika;
    }

    function set_slika($_slika) {
        $this->_slika = $_slika;
    }


    
    
}
