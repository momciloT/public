<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of API_SoapFunctions
 *
 * @author MTodorovic
 */
class API_SoapFunctions {

    protected $conn = null;

    private function makeConn() {
        if ($this->conn == null) {
            $this->conn = new Application_Model_Zakazivanje();
        }
    }

    /**
     *
     * Returns all movies
     * @return array
     */
    
}