<?php

class Application_Form_Migracija extends Zend_Form
{

    public function init()
    {
        $this->setAction("");
        $this->setMethod("post");
        $this->setAttrib('id', 'migracija');
        $this->setAttrib("class", "form-group migracija");
        
        
        $this->addElement('text', 'tbMigracioniKod', array(
            'placeholder' => 'Migracioni kod',
            'required' => true,
            'filters' => array('StringTrim'),
        ));
        
        $this->addElement('submit', 'btnSubmitMigracija', array(
            'ignore' => true,
            'label' => 'Prijavi',
        ));
        
         $migracionikod = $this->getElement('tbMigracioniKod');
        $migracionikod->setAttrib("class", "text_input");
        $migracionikod->setAttrib("class", " form-control migracija-polja migracija-polje-kod");
       
        $migracionikod->addValidators(array(array('NotEmpty', true, array('messages' => array('isEmpty' => 'Ovo polje je obavezno.',)))));
        $migracionikod->addValidator('Digits');

       
        $migracionikod->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        
        $submit = $this->getElement('btnSubmitMigracija');
        $submit->setAttrib("class", "btn btn-lg btn-primary btn-block migracija-polja");
        $submit->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors', array(array('data' => 'HtmlTag'),array('tag' => 'td','colspan' => '2', 'align' => 'center')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        $this->addElements(array(
            $migracionikod,
            $submit
        ));
        $this->setDecorators(array(
            'FormElements',
            array(array('data' => 'HtmlTag'), array('tag' => 'table')),
            'Form'
        ));

        
        
        
        
    }


}

