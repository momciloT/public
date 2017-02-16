<?php

class Application_Form_Login extends Zend_Form
{

   public function init()
    {
        $this->setAction("");
        $this->setMethod("post");
        $this->setAttrib('id', 'forma');
        $this->setAttrib("class", "form-group");

        $this->addElement('text', 'tbKorisnickoIme', array(
            'placeholder' => 'Korisnicko ime',
            'required' => true,
            'filters' => array('StringTrim'),
        ));

        $this->addElement('password', 'tbLozinka', array(
            'placeholder' => 'Lozinka',
            'required' => true,
        ));
        $this->addElement('submit', 'btnSubmit', array(
          
            'ignore' => true,
            'label' => 'Prijavi se',
        ));

        $username = $this->getElement('tbKorisnickoIme');
        $username->setAttrib("class", "text_input");
        $username->setAttrib("class", " form-control");
        $username->addValidators(array(array('NotEmpty', true, array('messages' => array('isEmpty' => 'Ovo polje je obavezno.',)))));
        $username->addValidator('Db_RecordExists', true, array('table' => 'ordinacija', 'field' => 'ime'));
        $username->getValidator('Db_RecordExists')->setMessage('Ovo korisničko ime ne postoji u bazi.');
        $username->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

        $password = $this->getElement('tbLozinka');
        $password->setAttrib("class", "text_input");
        $password->setAttrib('size', '40');
         $password->setAttrib('style', 'margin-top:10px;margin-bottom:10px;');
        $password->setAttrib("class", " form-control");
       
        $password->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                        'isEmpty' => 'Ovo polje je obavezno.',
                    )))
        ));

        $password->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

        $submit = $this->getElement('btnSubmit');
        $submit->setAttrib("class", "btn btn-lg btn-success btn-block");

        $submit->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors', array(array('data' => 'HtmlTag'),array('tag' => 'td','colspan' => '2', 'align' => 'center')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        $this->addElements(array(
            $username,
            $password,
            $submit
        ));
        $this->setDecorators(array(
            'FormElements',
            array(array('data' => 'HtmlTag'), array('tag' => 'table')),
            'Form'
        ));
    }



}

