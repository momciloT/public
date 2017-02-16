<?php

class OrdinacijaController extends Zend_Controller_Action {

    public function init() {
        $logovan = Zend_Auth::getInstance();
        $korisnik = $logovan->getIdentity();

        if (!$logovan->hasIdentity()) {
            Zend_Auth::getInstance()->clearIdentity();
            $this->_redirect('/index');
        }
    }

    public function indexAction() {
        $logovan = Zend_Auth::getInstance();
        $id = $logovan->getIdentity()->id;
        $ordinacijamapper = new Application_Model_OrdinacijainfoMapper();
        $this->view->podsetnik = $ordinacijamapper->getPodsetnik($id);
    }

    public function podesavanjaAction() {
        $logovan = Zend_Auth::getInstance();
        $ordinacija = $logovan->getIdentity()->id;
        $id_ordinacija = $ordinacija;
        $podaciMapper = new Application_Model_OrdinacijainfoMapper();
        $pod = $podaciMapper->getOrdinacija($id_ordinacija);
        if ($pod[0]['logo'] == '') {
            $this->view->logo = "zuba-logo.png";
        } else {
            $this->view->logo = $pod[0]['logo'];
        }
        $this->view->pregled = $pod;
    }

    public function editordinacijaAction() {
        $logovan = Zend_Auth::getInstance();
        $ordinacija = $logovan->getIdentity()->id;
        $id_ordinacija = $ordinacija;
        $formEdit = new Application_Form_Editordinacija();
        $this->view->form = $formEdit;
        $ordinacijamapper = new Application_Model_OrdinacijainfoMapper();
        if ($this->_request->isPost("submitbut")) {
            if ($this->view->form->isValid($this->_request->getPost())) {
                $post = $this->_request->getParams();
                $updateordinacija = $ordinacijamapper->updateOrdinacija($post, $id_ordinacija);

                $this->_redirect('/ordinacija/podesavanja');
            }
        } else {
            $pod = $ordinacijamapper->getOrdinacija($id_ordinacija);

            $data = array('pun_naziv' => $pod[0]['pun_naziv'], 'adresa' => $pod[0]['adresa'], 'broj_telefona' => $pod[0]['broj_telefona'], 'email' => $pod[0]['email'], 'naplata' => $pod[0]['naplata']);
            $formEdit->populate($data);
        }
    }

    public function logochangeAction() {
        $logovan = Zend_Auth::getInstance();
        $ordinacija = $logovan->getIdentity()->id;
        $path = 'img/logo/logoordinacija' . $ordinacija . '.jpg';
        $name = 'logoordinacija' . $ordinacija . '.jpg';
        $pacijentmapper = new Application_Model_OrdinacijainfoMapper();
        $pacijentmapper->promenaLogo($ordinacija, $name);
        move_uploaded_file($_FILES['file']['tmp_name'], $path);
    }

    public function pretragaAction() {
        $data = $this->_request->getParams();
        $logovan = Zend_Auth::getInstance();
        $ordinacija = $logovan->getIdentity()->id;
        $filterChain = new Zend_Filter();
        $filterChain->addFilter(new Zend_Filter_StringToLower());
        $pod = $filterChain->filter($data['pretraga']);
        $pacijentimapper = new Application_Model_PacijentMapper();
        $pretraga = $pacijentimapper->nadjipacijeta($pod, $ordinacija);
        echo $this->_helper->json($pretraga);
        exit;
    }

    public function statistikaAction() {
        
        $logovan = Zend_Auth::getInstance();
        $ordinacija = $logovan->getIdentity()->id;
        $datumi = array();

        $datum0 = new Zend_Date();
   
      $datum3 =$datum0->get(Zend_Date::WEEKDAY_8601);
      
    $datumminu=-($datum3)+1;
            for ($i =1; $i <=7; $i++) {

                $datum = new Zend_Date();
                $datum->add($datumminu, Zend_Date::DAY_SHORT);
                $datum3 = $datum->get('YYYY-MM-dd');
                $datumi[] = $datum3;
                $datumminu++;
       
        }
        
      $radovimapper=new Application_Model_RadoviMapper();
      $brojradova=$radovimapper->brojRadova($ordinacija,$datumi);
      
      $mesec=$datum0->get('MM');
      
      
      $ukupanbroj=$radovimapper->getUkupno($ordinacija, $mesec);
      
      $pojedinacno=$radovimapper->getPojedinacno($ordinacija, $mesec);
      
      $this->view->pojedinacno=$pojedinacno;
      
      $this->view->ukupno=$ukupanbroj;
      
       $this->view->datumi = $datumi;
  
       $this->view->datumi2=$brojradova;
    }

    public function podsetnikunosAction() {
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout->disableLayout();
        $data = $this->_request->getPost();
        $logovan = Zend_Auth::getInstance();
        $ordinacija = $logovan->getIdentity()->id;
        $datum = new Zend_Db_Expr('NOW()');
        $ordinacijamapper = new Application_Model_OrdinacijainfoMapper();
        $unesi = $ordinacijamapper->insertPodsetnik($ordinacija, $data['podsetnik'], $datum);
        echo $this->_helper->json($data['podsetnik'], $datum);
        exit;
    }

}
