<?php

class Application_Form_Editordinacija extends Zend_Form {

    public function init() {
        $this->setName("Ordinacija");
        $this->setMethod("post");
        $this->setAttrib('id', 'forma');


        $naziv = new Zend_Form_Element_Text('pun_naziv');
        $naziv->setLabel('Naziv ordinacije')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $naziv->setAttrib("class", "forma-polja form-control");

        $broj_telefona = new Zend_Form_Element_Text('broj_telefona');
        $broj_telefona->setLabel('Broj telefona')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $broj_telefona->setAttrib("class", "forma-polja form-control");

        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email ordinacije')
                ->setRequired(true)
                ->addValidator('EmailAddress')->addErrorMessage("Email u pogresnom formatu!")
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $email->setAttrib("class", "forma-polja form-control");
        

        $adresa = new Zend_Form_Element_Text('adresa');
        $adresa->setLabel('Adresa ordinacije')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $adresa->setAttrib("class", "forma-polja form-control");
        
        $naplata = new Zend_Form_Element_Checkbox('naplata');
        $naplata->setLabel('Vidljivo');

        $submit = new Zend_Form_Element_Submit('Sačuvaj');
        $submit->setAttrib('id', 'submitbut');
        $submit->setAttrib('class', 'btn btn-primary btn-block');

        $this->addElements(array($naziv, $broj_telefona, $adresa, $email, $naplata, $submit));
    }

}
