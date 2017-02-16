<?php

class Application_Form_Cena extends Zend_Form
{

    public function init()
    {
         $this->setAction("");
        $this->setMethod("post");
        $this->setAttrib('id', 'forma');

        
        $this->addElement('text', 'tbNaziv', array(
            'label' => 'Naziv:',
            'required' => true,
           
        ));
        
        $this->addElement('text', 'tbCena', array(
            'label' => 'Cena:',
            'required' => true,
           
        ));
        
        
        $this->addElement('submit', 'btnSubmit', array(
            'ignore' => true,
            'label' => 'Unesi',
        ));
        
        
        $naziv = $this->getElement('tbNaziv');
        $naziv->setAttrib("class", "forma");
        $naziv->addValidators(array(array('NotEmpty', true, array('messages' => array('isEmpty' => 'Ovo polje je obavezno.',)))));
        $naziv->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        
        $cena = $this->getElement('tbCena');
        $cena->setAttrib("class", "forma");
        $cena->addValidators(array(array('NotEmpty', true, array('messages' => array('isEmpty' => 'Ovo polje je obavezno.',)))));
        $cena->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        
        
        
        $submit = $this->getElement('btnSubmit');
        $submit->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors', array(array('data' => 'HtmlTag'), array('tag' => 'td', 'colspan' => '2', 'align' => 'center')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        
         $this->addElements(array(
            $naziv,
            $cena,
            $submit
        ));
        $this->setDecorators(array(
            'FormElements',
            array(array('data' => 'HtmlTag'), array('tag' => 'table')),
            'Form'
        ));
        
    }


}

