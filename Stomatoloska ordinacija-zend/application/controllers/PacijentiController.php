<?php

class PacijentiController extends Zend_Controller_Action {

    public function init() {
        if ($this->_helper->FlashMessenger->hasMessages()) {
            $this->view->messages = $this->_helper->FlashMessenger->getMessages();
        }
        $logovan = Zend_Auth::getInstance();
        $korisnik = $logovan->getIdentity();

        if (!$logovan->hasIdentity()) {
            Zend_Auth::getInstance()->clearIdentity();
            $this->_redirect('/index');
        }
    }

    public function indexAction() {
        
    }

    public function dodajAction() {

        $forma = new Application_Form_DodajPacijenta();
        $this->view->form = $forma;


        if ($this->_request->isPost("btnSubmitR")) {
            if ($this->view->form->isValid($this->_request->getPost())) {
                $post = $this->_request->getParams();


                $ime = $post['tbImePacijenta'];
                $prezime = $post['tbPrezimePacijenta'];
                $email = $post['tbEmail'];
                $adresa = $post['tbAdresa'];
                $mobilni = $post['tbMobilni'];
                $upozorenje = $post['tbNapomena'];
                $oboljenja = $post['tbOboljenja'];
                $datum = $post['tbDatum'];

                $logovan = Zend_Auth::getInstance();
                $ordinacija = $logovan->getIdentity()->id;
                $id_ordinacija = $ordinacija;


                $pacijentMapper = new Application_Model_PacijentMapper();
                $pacijent = new Application_Model_Pacijent();

                $pacijent->set_id_ordinacija($id_ordinacija);
                $pacijent->set_adresa($adresa);
                $pacijent->set_datum_rodjenja($datum);
                $pacijent->set_ime($ime);
                $pacijent->set_prezime($prezime);
                $pacijent->set_oboljenja($oboljenja);
                $pacijent->set_upozorenja($upozorenje);
                $pacijent->set_mobilni($mobilni);
                $pacijent->set_email($email);
                $pacijentMapper->save($pacijent);


                $this->_helper->flashMessenger->addMessage("Uspešno ste dodali pacijenta");
                //will redirect back to original url. May help, may not
                $this->_redirect($this->getRequest()->getRequestUri());
//                $forma->reset();
            }
        }
    }

    public function pacijentiAction() {

        $logovan = Zend_Auth::getInstance();
        $ordinacija = $logovan->getIdentity()->id;
        $id_ordinacija = $ordinacija;
        $pacijent2 = new Application_Model_Pacijent();
        $pacijentMapper = new Application_Model_PacijentMapper();
        $pacijenti = $pacijentMapper->getPacijetni($id_ordinacija);
        foreach ($pacijenti as $pacijent) {

            $niz[] = array(
                'id' => $pacijent->get_id(),
                'ime' => $pacijent->get_ime(),
                'prezime' => $pacijent->get_prezime(),
                'mobilni' => $pacijent->get_mobilni(),
            );
        }


        $this->view->pregled = $niz;
    }

    public function pacijentprikazAction() {
        $logovan = Zend_Auth::getInstance();
        $korisnik = $logovan->getIdentity();

        if (!$logovan->hasIdentity()) {
            Zend_Auth::getInstance()->clearIdentity();
            header('Location: /index');
        } else {
            $id = $this->getRequest()->getParam('id');
            if (!isset($id)) {
                $this->_redirect('/ordinacija');
            } else {
                $logovan = Zend_Auth::getInstance();
                $ido = $logovan->getIdentity()->id;
                $pacijentmapper = new Application_Model_PacijentMapper();
                $pacijent = $pacijentmapper->proveraPacijenta($id, $ido);
                $radmapper = new Application_Model_RadMapper();
                $rad = $radmapper->getRadovi($ido);
                $statusmapper = new Application_Model_StanjezubMapper();
                $status = $statusmapper->getStanja();
                if ($pacijent == '') {
                    $this->_redirect('/ordinacija');
                } else {

                    $pocetnistatusMapper = new Application_Model_StanjeMapper();
                    $pocetnistatusi = $pocetnistatusMapper->prikazslikastatuszub($id);

                    $stanjeizoperacijaMapper = new Application_Model_StanjeizoperacijaMapper();
                    $stanjeizoperacija = $stanjeizoperacijaMapper->getStanjaIzOperacija($id);

                    $this->view->stanjeizoperacija = $stanjeizoperacija;
                    $this->view->pocetnistatus = $pocetnistatusi;
                    $this->view->pregled = $pacijent;
                    $this->view->radovi = $rad;
                    $this->view->status = $status;
                }
            }
        }
    }

    public function pocetnistatusAction() {
        $logovan = Zend_Auth::getInstance();
        $korisnik = $logovan->getIdentity();

        if (!$logovan->hasIdentity()) {
            Zend_Auth::getInstance()->clearIdentity();
            header('Location: /index');
        } else {
            $id = $this->getRequest()->getParam('id');
            if (!isset($id)) {
                $this->_redirect('/ordinacija');
            } else {
                $logovan = Zend_Auth::getInstance();
                $ido = $logovan->getIdentity()->id;
                $pacijentmapper = new Application_Model_PacijentMapper();
                $pacijent = $pacijentmapper->proveraPacijenta($id, $ido);
                if ($pacijent == '') {
                    $this->_redirect('/ordinacija');
                }
            }
        }
        $statusmapper = new Application_Model_StanjezubMapper();
        $status = $statusmapper->getStanja();
        $this->view->status = $status;
    }

    public function pocetnostanjesaveAction() {
        $this->_helper->layout->disableLayout();
        $data = $this->_request->getPost();
        $stanjeMapper = new Application_Model_StanjeMapper();
        $this->_helper->viewRenderer->setNoRender(true);
        $stanje = $stanjeMapper->save($data);
    }

    public function pocetnostanjeproveraAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $stanjeMapper = new Application_Model_StanjeMapper();
        $data = $this->_request->getPost();
        $stanje = $stanjeMapper->proverazubstatus($data);
        if ($stanje == NULL) {
            echo 0;
            exit;
        } else {
            echo $this->_helper->json($stanje);
            exit;
        }
    }

    public function pocetnostanjeupdateAction() {
        $this->_helper->layout->disableLayout();
        $data = $this->_request->getPost();
        $stanjeMapper = new Application_Model_StanjeMapper();
        $this->_helper->viewRenderer->setNoRender(true);
        $stanje = $stanjeMapper->update($data);
    }

    public function radsaveAction() {
        $logovan = Zend_Auth::getInstance();
        $ido = $logovan->getIdentity()->id;
        $data = $this->_request->getPost();
        $this->_helper->viewRenderer->setNoRender(true);
        $radoviMapper = new Application_Model_RadoviMapper();
        $rad = $radoviMapper->saveRad($data, $ido);
        if ($rad == null) {
            echo $this->_helper->json($rad);
            exit;
        } else {
            echo"shit";
            exit;
        }
    }

    public function radoviAction() {
        $logovan = Zend_Auth::getInstance();
        $korisnik = $logovan->getIdentity();

        if (!$logovan->hasIdentity()) {
            Zend_Auth::getInstance()->clearIdentity();
            header('Location: /index');
        } else {
            $id = $this->getRequest()->getParam('id');
            if (!isset($id)) {
                $this->_redirect('/ordinacija');
            } else {
                $logovan = Zend_Auth::getInstance();
                $ido = $logovan->getIdentity()->id;
                $pacijentmapper = new Application_Model_PacijentMapper();
                $pacijent = $pacijentmapper->proveraPacijenta($id, $ido);
                if ($pacijent == '') {
                    $this->_redirect('/ordinacija');
                } else {
                    if ($pacijent[0]['odjava_kod'] != '') {
                        $this->view->kod=99;
                    }
                    $ordinacijamapper = new Application_Model_OrdinacijainfoMapper();
                    $naplata = $ordinacijamapper->getNaplata($ido);
                    $radovimapper = new Application_Model_RadoviMapper();
                    if ($naplata[0]['naplata'] == '1') {
                        $radovi = $radovimapper->getRadoviFull($id);
                        $this->view->radovi = $radovi;
                    } else {
                        $radovi = $radovimapper->getRadovi($id);
                        $this->view->radovi = $radovi;
                    }
                }
            }
        }
    }

    public function operacijadetaljnoAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $data = $this->_request->getPost();
        $radoviMapper = new Application_Model_RadoviMapper();
        $radMapper = new Application_Model_RadMapper();
        $stanjeMapper = new Application_Model_StanjezubMapper();
        $rad = $radoviMapper->getOperacija($data);

        $radOpis = $radMapper->getRadOpis($rad[0]['rad']);
        $rad[0]['radOpis'] = $radOpis[0]['opis'];

        if ($rad != null) {
            echo $this->_helper->json($rad);
            exit;
        } else {
            echo"shit";
            exit;
        }
    }

    public function obrisioperacijuAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $data = $this->_request->getPost();
        $id = $data['ido'];
        $radovimapper = new Application_Model_RadoviMapper();
        $obrisirad = $radovimapper->obrisiSanaciju($id);
        if ($obrisirad == null) {
            echo $this->_helper->json($obrisirad);
            exit;
        } else {
            echo"shit";
            exit;
        }
    }

    public function podacioAction() {
        $logovan = Zend_Auth::getInstance();
        $korisnik = $logovan->getIdentity();

        if (!$logovan->hasIdentity()) {
            Zend_Auth::getInstance()->clearIdentity();
            header('Location: /index');
        } else {
            $id = $this->getRequest()->getParam('id');
            if (!isset($id)) {
                $this->_redirect('/ordinacija');
            } else {
                $logovan = Zend_Auth::getInstance();
                $ido = $logovan->getIdentity()->id;
                $pacijentmapper = new Application_Model_PacijentMapper();
                $pacijent = $pacijentmapper->proveraPacijenta($id, $ido);
                if ($pacijent == '') {
                    $this->_redirect('/ordinacija');
                } else {

                    $pacijentinfoMapper = new Application_Model_PacijentinfoMapper();
                    $pacijentinfo = $pacijentinfoMapper->getInfo($id);
                    $this->view->pacijetniinfo = $pacijentinfo;
                }
            }
        }
    }

    public function slikasaveAction() {
        $id = $this->getRequest()->getParam('id');
        $name = 'img/imageuser' . $id . '.jpg';
        $pacijentmapper = new Application_Model_PacijentMapper();
        $pacijentmapper->promenaSlika($id, $name);
        move_uploaded_file($_FILES['webcam']['tmp_name'], $name);
    }

    public function slikasave2Action() {
        $id = $this->getRequest()->getParam('id');
        $name = 'img/imageuser' . $id . '.jpg';
        $pacijentmapper = new Application_Model_PacijentMapper();
        $pacijentmapper->promenaSlika($id, $name);
        move_uploaded_file($_FILES['file']['tmp_name'], $name);
    }

    public function radoviStampaAction() {
        
    }

    public function radoviprintAction() {
        
    }

    public function odjavaAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $data = $this->_request->getPost();
        $id = $data['id'];
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 7; $i++) {
            $randomString.=$characters[rand(0, $charactersLength - 1)];
        }
        $pacijentimapper = new Application_Model_PacijentMapper();
        if ($i == 7) {
            $pacijentimapper->odjaviPacijenta($id, $randomString);
        }
        if ($pacijentimapper != '') {
            echo $this->_helper->json('Kod za odjavu: ' . $randomString);
            exit();
        }
    }

    public function migracijaAction() {
        $pacijentmapper = new Application_Model_PacijentMapper();
        $logovan = Zend_Auth::getInstance();
        $ido = $logovan->getIdentity()->id;
        $form = new Application_Form_Migracija;
        $this->view->forma = $form;
        if ($this->_request->isPost("btnSubmitMigracija")) {
            if ($this->view->forma->isValid($this->_request->getPost())) {
                $post = $this->_request->getParams();

                $migracija = $pacijentmapper->prijaviPacijenta($ido, $post['tbMigracioniKod']);
                if ($migracija != 1) {
                    $this->view->proba = "Nepostojeci kod";
                } else {
                    $this->view->proba = "Uspesno prijavljen pacijetn";
                    $form->reset();
                }
            }
        }
    }

    public function editpacijentAction() {
        $logovan = Zend_Auth::getInstance();
        $ordinacija = $logovan->getIdentity()->id;
        $formEdit = new Application_Form_DodajPacijenta();
        $id = $this->getRequest()->getParam('id');
        $this->view->form = $formEdit;
        $pacijentimapper = new Application_Model_PacijentMapper();
        $pod = $pacijentimapper->proveraPacijenta($id, $ordinacija);
        if ($pod == "") {
            $this->_redirect('/ordinacija');
        } else {
            if ($pod[0]['odjava_kod'] != '') {
                $this->_redirect('/ordinacija');
            } else {
                $this->view->id = $pod[0]['id'];

                if ($this->_request->isPost("btnSubmitR")) {
                    if ($this->view->form->isValid($this->_request->getPost())) {
                        $post = $this->_request->getParams();
                        $updatepacijent = $pacijentimapper->updatePacijent($post, $id);

                        $this->_redirect('/pacijenti/pacijentprikaz/id/' . $id);
                    }
                } else {

                    $data = array('tbImePacijenta' => $pod[0]['ime'], 'tbPrezimePacijenta' => $pod[0]['prezime'], 'tbEmail' => $pod[0]['email'], 'tbDatum' => $pod[0]['datum_rodjenja'], 'tbAdresa' => $pod[0]['adresa'], 'tbNapomena' => $pod[0]['upozorenja'], 'tbOboljenja' => $pod[0]['oboljenja'], 'tbMobilni' => $pod[0]['mobilni']);
                    $formEdit->populate($data);
                }
            }
        }
    }

}
