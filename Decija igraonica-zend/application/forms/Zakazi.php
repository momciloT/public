<?php

class Application_Form_Zakazi extends Zend_Form {

    public function init() {

        $this->setAction('')->setMethod('post');
        $this->setAttrib('name', 'zakazivanjeforma');
      

        $ime = new Zend_Form_Element_Text('tbIme');
        $ime->setAttrib('id', 'tbIme');
        $ime->setLabel('Vaše ime: ');
        $ime->setAttrib('class', 'forma');
        $ime->setRequired(TRUE)->addErrorMessage('Ovo polje je obavezno!');
        $ime->addValidator(new Zend_Validate_Alpha());
        $this->addElement($ime);

        $telefon = new Zend_Form_Element_Text('tbTelefon');
        $telefon->setAttrib('id', 'tbTelefon');
        $telefon->setLabel('Kontakt telefon: ');
        $telefon->setAttrib('class', 'forma');
        $telefon->setRequired(TRUE)->addErrorMessage('Ovo polje je obavezno!');
        $telefon->addValidator(new Zend_Validate_Digits())->addErrorMessage('Uneste samo brojeve');
        $this->addElement($telefon);

        $email = new Zend_Form_Element_Text('tbEmail');
        $email->setLabel('Vas email :');
        $email->setAttrib('class', 'forma');
        $email->setAttrib('id', 'tbEmail');
        $email->addValidator(new Zend_Validate_EmailAddress())->addErrorMessage('Email adresa nije u dobrom formatu');
        $this->addElement($email);

        $selectgodine = new Zend_Form_Element_Select('select_godine');
        $selectgodine->setAttrib('id', 'select_godine');
        $selectgodine->setRequired(TRUE)->addErrorMessage('Ovo polje je obavezno!');
        $selectgodine->addMultiOption(0, 'Koliko slavljenik puni godina?');
        $selectgodine->addMultiOption(1, 1);
        $selectgodine->addMultiOption(2, 2);
        $selectgodine->addMultiOption(3, 3);
        $selectgodine->addMultiOption(4, 4);
        $selectgodine->addMultiOption(5, 5);
        $selectgodine->addMultiOption(6, 6);
        $selectgodine->addMultiOption(7, 7);
        $selectgodine->addMultiOption(8, 8);
        $selectgodine->addMultiOption(9, 9);
        $selectgodine->addMultiOption(10, 10);

        $this->addElement($selectgodine);

        $datum = new Application_Model_Zakazivanje();
        $datum2 = $datum->datum();
        $select = new Zend_Form_Element_Select('select_datum');
        $select->setAttrib('id', 'select_datum');
        $select->setRequired(TRUE)->addErrorMessage('Ovo polje je obavezno!');
        $select->addMultiOption(0, 'Izaberi datum');
        foreach ($datum2 as $loc) {
            $select->addMultiOption($loc, $loc);
        }
        //  $select->addValidator('Db_NoRecordExists', true, array('table' => 'rodjendan', 'field' => 'datum'));
        //$select->getValidator('Db_NoRecordExists')->setMessage('Korisničko ime već postoji u bazi.');
        $this->addElement($select);


        $selecttermin = new Zend_Form_Element_Select('select_termin');
        $selecttermin->setRequired(TRUE)->addErrorMessage('Ovo polje je obavezno!');
        $selecttermin->addMultiOption(0, 'Izaberi termin');
        $selecttermin->setAttrib('id', 'select_termin');
        $selecttermin->addMultiOption(12, 12);
        $selecttermin->addMultiOption(15, 15);
        $selecttermin->addMultiOption(18, 18);

        $this->addElement($selecttermin);

        $submit = new Zend_Form_Element_Submit('btnPosalji');
        $submit->setLabel('Zakaži');
        $submit->setAttrib('class', 'dugme');
        $submit->setAttrib('id', 'btnSubmit');
        $this->addElement($submit);
    }

}
