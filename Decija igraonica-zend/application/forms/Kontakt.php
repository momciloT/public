<?php

class Application_Form_Kontakt extends Zend_Form
{

    public function init()
    {
        $this->setAction('')->setMethod('post');
        $this->setAttrib('name', 'kontaktforma');
        
        $ime=new Zend_Form_Element_Text('tbIme');
        $ime->setAttrib('id', 'tbIme');
        $ime->setLabel('Vaše ime: ');
        $ime->setAttrib('class', 'forma');
        $ime->setRequired(TRUE)->addErrorMessage('Ovo polje je obavezno!');
        $ime->addValidator(new Zend_Validate_Alpha());
        $this->addElement($ime);
        
        $email=new Zend_Form_Element_Text('tbEmail');
        $email->setLabel('Vas email :');
        $email->setAttrib('class', 'forma');
        $email->setAttrib('id', 'tbEmail');
        $email->addValidator(new Zend_Validate_EmailAddress())->addErrorMessage('Email adresa nije u dobrom formatu');
        $this->addElement($email);
        
        $telefon=new Zend_Form_Element_Text('tbBrojt');
        $telefon->setLabel('Broj telefona :');
        $telefon->setAttrib('id', 'tbBrojt');
        $telefon->setAttrib('class', 'forma');
        $this->addElement($telefon);
        
        $poruka=new Zend_Form_Element_Textarea('tbPoruka');
        $poruka->setLabel('Vaša poruka :');
        $poruka->setAttrib('class', 'forma');
        $poruka->setAttrib('id', 'tbPoruka');
        $poruka->setRequired(TRUE)->addErrorMessage('Morate popuniti polje za poruku.');
        $poruka->setAttrib('rows', '7');
        $this->addElement($poruka);
                
        $submit = new Zend_Form_Element_Submit('btnPosalji');
        $submit->setLabel('Pošalji');
        $submit->setAttrib('class', 'dugme');
        $submit->setAttrib('id', 'btnSubmit');
        $this->addElement($submit);
         
        
       
    }


}

