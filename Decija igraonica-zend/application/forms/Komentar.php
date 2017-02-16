<?php

class Application_Form_Komentar extends Zend_Form
{

    public function init()
    {
        $this->setAction('')->setMethod('post');
        $this->setAttrib('name', 'komentarforma');
        
        $poruka=new Zend_Form_Element_Textarea('tbPoruka');
        $poruka->setLabel('Vaša poruka :');
        $poruka->setAttrib('class', 'forma');
        $poruka->setAttrib('id', 'tbPoruka');
        $poruka->setRequired(TRUE)->addErrorMessage('Morate popuniti polje za komentar.');
        $poruka->setAttrib('rows', '7');
        $this->addElement($poruka);
        
        $submit = new Zend_Form_Element_Submit('btnPosalji');
        $submit->setLabel('Pošalji');
        $submit->setAttrib('class', 'dugme');
        $submit->setAttrib('id', 'btnSubmit');
        $this->addElement($submit);
       
       
    }


}

