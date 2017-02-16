<?php

class Application_Form_Aktivnost extends Zend_Form {

    public function init() {
        $this->setAction("");
        $this->setMethod("post");
        $this->setAttrib('id', 'forma');

        $this->addElement('text', 'tbNaziv', array(
            'label' => 'Naziv aktivnosti:',
            'required' => true,
           
        ));

        $this->addElement('textarea', 'tbOpis', array(
            'label' => 'Opis:',
            'required' => true,
        ));

        $this->addElement('text', 'tbTermin', array(
            'label' => 'Termin:',
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

        $opis = $this->getElement('tbOpis');
        $opis->setAttrib("class", "forma");
        $opis->setAttrib('rows', '8');
        $opis->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                        'isEmpty' => 'Ovo polje je obavezno.',
                    )))
        ));

        $opis->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

        $termin = $this->getElement('tbTermin');
        $termin->setAttrib("class", "forma");
        $termin->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                        'isEmpty' => 'Ovo polje je obavezno.',
                    )))
        ));

        $termin->setDecorators(array(
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
            $opis,
            $termin,
            $submit
        ));
        $this->setDecorators(array(
            'FormElements',
            array(array('data' => 'HtmlTag'), array('tag' => 'table')),
            'Form'
        ));
    }

}
