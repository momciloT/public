<?php

class Application_Model_Pacijentinfo {

    protected $_id;
    protected $_id_korisnik;
    protected $_organizacija;
    protected $_mesto_rada;
    protected $_registarski_broj;
    protected $_sifra_delatnosti;
    protected $_posao_koji_obavlja;
    protected $_fond_zdravstene_zastite;

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
    
    function get_id() {
        return $this->_id;
    }

    function get_id_korisnik() {
        return $this->_id_korisnik;
    }

    function get_organizacija() {
        return $this->_organizacija;
    }

    function get_mesto_rada() {
        return $this->_mesto_rada;
    }

    function get_registarski_broj() {
        return $this->_registarski_broj;
    }

    function get_sifra_delatnosti() {
        return $this->_sifra_delatnosti;
    }

    function get_posao_koji_obavlja() {
        return $this->_posao_koji_obavlja;
    }

    function get_fond_zdravstene_zastite() {
        return $this->_fond_zdravstene_zastite;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_id_korisnik($_id_korisnik) {
        $this->_id_korisnik = $_id_korisnik;
    }

    function set_organizacija($_organizacija) {
        $this->_organizacija = $_organizacija;
    }

    function set_mesto_rada($_mesto_rada) {
        $this->_mesto_rada = $_mesto_rada;
    }

    function set_registarski_broj($_registarski_broj) {
        $this->_registarski_broj = $_registarski_broj;
    }

    function set_sifra_delatnosti($_sifra_delatnosti) {
        $this->_sifra_delatnosti = $_sifra_delatnosti;
    }

    function set_posao_koji_obavlja($_posao_koji_obavlja) {
        $this->_posao_koji_obavlja = $_posao_koji_obavlja;
    }

    function set_fond_zdravstene_zastite($_fond_zdravstene_zastite) {
        $this->_fond_zdravstene_zastite = $_fond_zdravstene_zastite;
    }



}
