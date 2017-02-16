<?php

class CenovnikController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {   $this->view->Naslov="Cenovnik";
        $this->view->headTitle('Cenovnik','PREPEND');
        
        $cenovnik=new Application_Model_Cena;
        $this->view->cenovnik=$cenovnik->get_cene();
      
      


}
}