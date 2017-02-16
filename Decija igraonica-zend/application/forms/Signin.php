<?php

class Application_Form_Signin extends Zend_Form {

    public function init() {

        $this->setAction("");
        $this->setMethod("post");
        $this->setAttrib('id', 'forma');

        $this->addElement('text', 'tbKorisnickoImeR', array(
            'label' => 'Korisničko ime:',
            'required' => true,
            'filters' => array('StringTrim', 'StripTags'),
        ));

        $this->addElement('password', 'tbLozinkaR', array(
            'label' => 'Lozinka:',
            'required' => true
        ));

        $this->addElement('text', 'tbEmailR', array(
            'label' => 'Email:',
            'required' => true,
            'filters' => array('StringTrim')
        ));

        $this->addElement('submit', 'btnSubmitR', array(
            'ignore' => true,
            'label' => 'Registruj se'
        ));

//username
        $username = $this->getElement('tbKorisnickoImeR');
        $username->setAttrib("class", "text_input");
        $username->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                        'isEmpty' => 'Ovo polje je obavezno.',
                    )))
        ));
        $username_stringlength_validate = new Zend_Validate_StringLength(4, 15);
        $username->addValidator($username_stringlength_validate);
        $username->getValidator('Zend_Validate_StringLength')->setMessage('Korisničko ime mora da sadrži od 4 do 15
karaktera.');

        $username->addValidator('Db_NoRecordExists', true, array('table' => 'korisnik', 'field' => 'ime'));
        $username->getValidator('Db_NoRecordExists')->setMessage('Korisničko ime već postoji u bazi.');

        $username->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

//lozinka
        $password = $this->getElement('tbLozinkaR');
        $password->setAttrib("class", "text_input");

        $password->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                        'isEmpty' => 'Ovo polje je obavezno.',
            )))));
        $password_stringlength_validate = new
                Zend_Validate_StringLength(4, 15);
        $password->addValidator($password_stringlength_validate);
        $password->getValidator('Zend_Validate_StringLength')->setMessage('Lozinka mora da sadrži od 4 do 15 karaktera.');
        $password->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

//email
        $email = $this->getElement('tbEmailR');
        $email->setAttrib("class", "text_input");
        $email->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                        'isEmpty' => 'Ovo polje je obavezno.',
                    )))
        ));

        $email->addValidator('EmailAddress');
        $email->getValidator('EmailAddress')->setMessage('Email nije u dobrom formatu.');
        $email->addValidator('Db_NoRecordExists', true, array('table' => 'korisnik', 'field' => 'email'));
        $email->getValidator('Db_NoRecordExists')->setMessage('Email već postoji u bazi.');

        $email->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));





//submit
        $submit = $this->getElement('btnSubmitR');

        $submit->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors', array(array('data' => 'HtmlTag'),
                array('tag' => 'td',
                    'colspan' => '2', 'align' => 'center')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

//uvek na kraju mora ovo
        $this->setDecorators(array(
            'FormElements',
            array(array('data' => 'HtmlTag'), array('tag' => 'table')),
            'Form'
        ));
    }

}
