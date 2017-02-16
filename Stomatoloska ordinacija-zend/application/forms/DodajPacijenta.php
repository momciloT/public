<?php

class Application_Form_DodajPacijenta extends Zend_Form {

    public function init() {
        $this->setAction("");
        $this->setMethod("post");
        $this->setAttrib('id', 'forma');
        $this->addElement('text', 'tbImePacijenta', array(
            
            'placeholder' => 'Ime',
            'required' => true,
            'filters' => array('StringTrim', 'StripTags'),
        ));


        $username = $this->getElement('tbImePacijenta');
        $username->setAttrib("class", "text_input");
        $username->setAttrib("class", "forma-polja form-control");
        $username->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                        'isEmpty' => 'Ovo polje je obavezno.',
                    )))
        ));
        $ime_validator_slova = new Zend_Validate_Alpha();
        $username->addValidator($ime_validator_slova);
        $username->getValidator('Zend_Validate_Alpha')->setMessage('Moraju biti unesena samo slova');
        $username_stringlength_validate = new Zend_Validate_StringLength(4, 15);
        $username->addValidator($username_stringlength_validate);
        $username->getValidator('Zend_Validate_StringLength')->setMessage('Ime mora da sadrži od 4 do 15 karaktera.');
        $username->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        
        $this->addElement('text', 'tbPrezimePacijenta', array(
            'placeholder' => 'Prezime',
            'required' => true,
            'filters' => array('StringTrim', 'StripTags'),
        ));
        $prezime = $this->getElement('tbPrezimePacijenta');
        $prezime->setAttrib("class", "text_input");
        $prezime->setAttrib("class", "forma-polja form-control");
        $prezime->addValidators(array(array('NotEmpty', true, array('messages' => array('isEmpty' => 'Ovo polje je obavezno.',)))));
        $validator_slova = new Zend_Validate_Alpha();
        $prezime_stringlength_validate = new Zend_Validate_StringLength(4, 15);
        $prezime->addValidator($prezime_stringlength_validate);
        $prezime->getValidator('Zend_Validate_StringLength')->setMessage('Prezime mora da sadrži od 4 do 15 karaktera.');
        $prezime->addValidator($validator_slova);
        $prezime->getValidator('Zend_Validate_Alpha')->setMessage('Moraju biti unesena samo slova');
        $prezime->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));


        $email = new Zend_Form_Element_Text('tbEmail');
        $email->setAttrib('placeholder', 'Email');
        $email->setAttrib("class", "forma-polja form-control");
        $email->setAttrib('id', 'tbEmail');
        $email->addValidator(new Zend_Validate_EmailAddress())->addErrorMessage('Email adresa nije u dobrom formatu');
        $email->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        $this->addElement($email);




        $datumrodjenja = new Zend_Form_Element_Text('tbDatum');
        $datumrodjenja->setAttrib('placeholder', 'Datum rodjenja');
        $datumrodjenja->setAttrib("class", "forma-polja form-control");
        $datumrodjenja->setAttrib('id', 'tbDatum');
        $datumrodjenja->addValidators(array(array('NotEmpty', true, array('messages' => array('isEmpty' => 'Ovo polje je obavezno.',)))));
        $datumrodjenja->addValidator(new Zend_Validate_Date('dd.MM.yyyy'))->addErrorMessage('Unesite datum u formatu dan.mesec.godina');
        $datumrodjenja->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        $this->addElement($datumrodjenja);




        $adresa = new Zend_Form_Element_Text('tbAdresa');
        $adresa->setAttrib('placeholder', 'Adresa');
        $adresa->setAttrib("class", "forma-polja form-control");
        $adresa->setAttrib('id', 'tbAdresa');
        $adresa->setRequired(TRUE)->addErrorMessage('Ovo polje je obavezno!');
        $adresa->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        $this->addElement($adresa);

        $mobilni = new Zend_Form_Element_Text('tbMobilni');
        $mobilni->setAttrib('placeholder', 'Telefon');
        $mobilni->setAttrib('id', 'tbMobilni');
        $mobilni->setAttrib("class", "forma-polja form-control");
        $mobilni->setRequired(TRUE)->addErrorMessage('Morate uneti kontakt telefon');
        $mobilni->addValidator(new Zend_Validate_Digits())->addErrorMessage('Dozvoljen samo unos brojeva');
        $mobilni->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        $this->addElement($mobilni);

        $napomena = new Zend_Form_Element_Textarea('tbNapomena');
        $napomena->setAttrib('placeholder', 'Napomena');
        $napomena->setAttrib('rows', '5');
        $napomena->setAttrib('class', 'forma-polja form-control');
        $napomena->setAttrib('id', 'tbNapomena');

        $napomena->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        $this->addElement($napomena);


        $oboljenja = new Zend_Form_Element_Textarea('tbOboljenja');
        $oboljenja->setAttrib('placeholder', 'Značajna oboljenja i stanja');
        $oboljenja->setAttrib('rows', '5');
        $oboljenja->setAttrib("class", "forma-polja form-control");
        $oboljenja->setAttrib('id', 'tbOboljenja');

        $oboljenja->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        $this->addElement($oboljenja);


//        $datumrodjenja = new ZendX_JQuery_Form_Element_DatePicker('dp1',
//            array('jQueryParams' => array('dateFormat' => 'yy-mm-dd'))
//        );
//        $datumrodjenja->setDecorators(array(
//            'ViewHelper',
//            'Description',
//            'Errors',
//            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
//            array('Label', array('tag' => 'td')),
//            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
//        ));
//$this->addElement($datumrodjenja);












        $this->addElement('submit', 'btnSubmitR', array(
            'ignore' => true,
            'label' => 'Dodaj pacijenta'
        ));

        $submit = $this->getElement('btnSubmitR');
        $submit->setAttrib('class', 'btn btn-primary');

        $submit->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors', array(array('data' => 'HtmlTag'),
                array('tag' => 'td',
                    'colspan' => '2', 'align' => 'center')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));



        $this->setDecorators(array(
            'FormElements',
            array(array('data' => 'HtmlTag'), array('tag' => 'table')),
            'Form'
        ));
    }

}
