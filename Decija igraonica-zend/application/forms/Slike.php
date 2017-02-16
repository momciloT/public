<?php

class Application_Form_Slike extends Zend_Form {

    public function init() {
        $this->setAction("");
        $this->setMethod("post");
        $this->addElement('file', 'slika', array(
            'label' => 'Slika: ',
            'required' => true,
            'validators' => array(
                array('extension', true, array(
                        'extention' => 'jpg,png,gif',
                        'messages' => array(
                            Zend_Validate_File_Extension::NOT_FOUND =>
                            'Pogrešan format slike.',
                            Zend_Validate_File_Extension::FALSE_EXTENSION =>
                            'Pogrešan format slike.'))))
        ));
      
        
        $aktinvostimodel=new Application_Model_Aktivnost();
        $aktinvost=$aktinvostimodel->getAktivnosti();
        $aktinvosti = new Zend_Form_Element_Select('select_aktivnost');
        $aktinvosti->setAttrib('id', 'select_aktivnost');
        $aktinvosti->setRequired(TRUE)->addErrorMessage('Ovo polje je obavezno!');
        $aktinvosti->addMultiOption(0, 'Izaberi aktivnost');
         foreach ($aktinvost as $loc) {
            $aktinvosti->addMultiOption($loc['id'], $loc['ime']);
        }
          $this->addElement($aktinvosti);

            $this->addElement('submit', 'btnSubmit', array(
            'ignore' => true,
            'label' => 'Unesi'
        ));
          
           $ak = $this->getElement('select_aktivnost');
        $ak->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' =>
                    'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
          
          
        $slika = $this->getElement('slika');
        $slika->setDecorators(array(
            'File',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' =>
                    'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        $submit = $this->getElement('btnSubmit');
        $submit->setAttrib("class", "btn btn-primary");
        $submit->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors', array(array('data' => 'HtmlTag'),
                array('tag' => 'td',
                    'colspan' => '2', 'align' => 'right')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
//uvek na kraju mora ovo
        $this->setDecorators(array(
            'FormElements',
            array(array('data' => 'HtmlTag'), array('tag' =>
                    'table', 'class' => 'table table-bordered table-hover tablestriped
tablesorter')),
            'Form'
        ));
    }

}
