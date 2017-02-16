<?php

class ZakaziController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function indexAction() {
        $this->view->Naslov = "Zakazivanje Rođendana";
        $request = $this->getRequest();
        $form = new Application_Form_Zakazi();


        $this->view->form = $form;


        if ($this->_request->isPost("btnSubmit")) {
            if ($this->view->form->isValid($this->_request->getPost())) {


                $post = $this->getRequest()->getParams();
                $auth = new Application_Model_Zakazivanje();
                $res = $auth->rezervisiTermin($post);
                if ($res == 1) {
                    $this->view->status = "Uspešno ste rezervisali termin";
                    $form->reset();
                } else {
                    $this->view->status = "Molimo popunite sva polja";
                }
            }
        }
    }

    public function soapAction() {
        
    }

}
