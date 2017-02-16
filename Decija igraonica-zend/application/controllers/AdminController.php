<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        $logovan = Zend_Auth::getInstance();
        $korisnik = $logovan->getIdentity()->uloga;

        if (!$logovan->hasIdentity() || $korisnik != 1) {
            Zend_Auth::getInstance()->clearIdentity();
            $this->_redirect('/ulaz');
        }
    }

    public function indexAction()
    {
        // action body
    }

    public function slikeAction()
    {
        $slike = new Application_Model_Slike();
        $this->view->Naslov = "Adminstriranje slika";
        $form = new Application_Form_Slike();
        $this->view->formaslike = $form;

        if ($this->_request->isPost("btnSubmit")) {
            if ($this->view->formaslike->isValid($this->_request->getPost())) {

                $post = $this->_request->getParams();
                $upload = new Zend_File_Transfer_Adapter_Http();
                try {

                    $tmp = $upload->getFileInfo();
                    $slika = $tmp['slika'];
                    $change = new Application_Model_ChangeImage();
                    $change->tmp_name = $slika['tmp_name'];
                    $change->name = $slika['name'];
                    $change->destination = "img";
                    $img = $change->upload();
                    if ($img != 0) {
                        $this->view->status = $slike->unesi_sliku($img, $post);
                    } else {
                        $this->views->status = "Neuspesno uneta slika";
                    }
                } catch (Zend_File_Transfer_Exception $e) {
                    $e->getMessage();
                }
            }
        }
        $form->reset();
        $dohvati_slike = $slike->getslikesve();
        $this->view->dohvati_slike = $dohvati_slike;
    }

    public function obslikeAction()
    {
        $get = $this->_request->getParams();


        $slika = new Application_Model_Slike();

        $slika->obrisi_sliku($get['id']);

        $this->_redirect("/admin/slike");
    }

    public function rezervacijeAction()
    {
        $this->view->Naslov = "Administracija rezervacijama za rodjendade";
        $dohvati_rezervacije = new Application_Model_Zakazivanje();
        $dohvati_rezervaciju = $dohvati_rezervacije->getrezervacije();
        $this->view->dohvati_rezervacije = $dohvati_rezervaciju;
    }

    public function obrezervacijeAction()
    {
        $get = $this->_request->getParams();


        $slika = new Application_Model_Zakazivanje();

        $slika->obrisi_rezervaciju($get['id']);

        $this->_redirect("/admin/rezervacije");
    }

    public function korisnikAction()
    {
        $this->view->Naslov = "Administracija korisnika";
        $dohvati_korisnike = new Application_Model_Korisnik();
        $dohvati_korisnika = $dohvati_korisnike->get_korisnici();
        $this->view->dohvati_korisnike = $dohvati_korisnika;
    }

    public function obkorisnikAction()
    {
        $get = $this->_request->getParams();


        $korisnik = new Application_Model_Korisnik();

        $korisnik->obrisi_korisnika($get['id']);

        $this->_redirect("/admin/korisnik");
    }

    public function obaktivnostkAction()
    {
        $get = $this->_request->getParams();


        $korisnik = new Application_Model_Aktivnost();

        $korisnik->obrisi_aktivnost($get['id']);

        $this->_redirect("/admin/korisnik");
    }

    public function aktivnostAction()
    {
        $this->view->Naslov="Administracija aktivnostima";
        $request = $this->getRequest();
        $aktivnosti = new Application_Model_Aktivnost();
        $form = new Application_Form_Aktivnost();
          $this->view->form = $form;
        if ($this->_request->isPost("btnSubmit")) {
            if ($this->view->form->isValid($this->_request->getPost())) {
             $post = $this->_request->getParams();
            $aktivnosti->insertAktivnost($post);
        }
        }
$form->reset();
   
        $dohvati_aktivnosti = $aktivnosti->getAktivnosti();
        $this->view->dohvati_aktivnosti = $dohvati_aktivnosti;
    }

    public function izmeniaktivnostAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout->disableLayout();

        $post = $this->_request->getParams();

        $proizvodi = new Application_Model_Aktivnost();

        echo $proizvodi->updateAktivnost($post);
    }

    public function cenaAction()
    {
        $this->view->Naslov="Administracija cenovnikom";
        $request = $this->getRequest();
        $cenovnik = new Application_Model_Cena();
        $form = new Application_Form_Cena();
          $this->view->form = $form;
        if ($this->_request->isPost("btnSubmit")) {
            if ($this->view->form->isValid($this->_request->getPost())) {
             $post = $this->_request->getParams();
            $cenovnik->insertCena($post);
        }
        }
$form->reset();
   
        $dohvati_cenovnik = $cenovnik->get_cene();
        $this->view->dohvati_cenovnik = $dohvati_cenovnik;
    }

    public function obcenaAction()
    {
        
        $get = $this->_request->getParams();


        $korisnik = new Application_Model_Cena();

        $korisnik->obrisi_cenu($get['id']);

        $this->_redirect("/admin/cena");
    }

    public function izmenicenaAction()
    {
      $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout->disableLayout();

        $post = $this->_request->getParams();

        $proizvodi = new Application_Model_Cena();

        echo $proizvodi->updateCena($post);
    }

    public function obaktivnostAction()
    {
        $get = $this->_request->getParams();


        $korisnik = new Application_Model_Aktivnost();

        $korisnik->obrisi_aktivnost($get['id']);

        $this->_redirect("/admin/aktivnost");
    }


}





/*public function unosproizvodaAction()
    {
        $proizvodi = new Application_Model_Proizvodi();
        
        $form = new Application_Form_Unosproizvoda();
        
        $this->view->form = $form;
        
        $get = $this->_request->getParams();
        
        if(isset($get['id_kategorije'])){
            $podkategorije = new Application_Model_Podkategorije();
            
            $options = $podkategorije->options_podkategorije($get['id_kategorije']);
            
            $form->getElement("ddlKategorije")->setValue($get['id_kategorije']);
            $form->getElement("ddlPodkategorije")->setMultiOptions($options);
            $form->getElement("ddlPodkategorije")->setAttrib("disabled", null);
        }
        
        $post = $this->_request->getParams();
        
        if ($this->_request->isPost() && $post['btnSubmit']) {
            if($this->view->form->isValid($this->_request->getPost())){
               
                $id_proizvoda = $proizvodi->unos_proizvoda($post);
                
                if($id_proizvoda){
                    
                    $upload = new Zend_File_Transfer_Adapter_Http();
                
                    try {
                        $files = $upload->getFileInfo();                        
                        $change = new Application_Model_ChangeImage();
                        
                        foreach ($files as $key => $file) {
                            $change->tmp_name = $file['tmp_name'];
                            $change->name = $file['name'];
                            $change->destination = "slike_proizvoda";
                            $img = $change->upload();
                            
                            if(!empty($img)){
                                $proizvodi->unesi_sliku_proizvoda($id_proizvoda, $img);
                            }
                            
                        }
                        
                        $this->view->status = 1;


                    } catch (Zend_File_Transfer_Exception $e) {
                        $e->getMessage();
                        $this->view->status = 0;
                    }
                    
                }else{
                    $this->view->status = 0;
                }
                
                
                
            }
        }
        $get_proizovdi = $proizvodi->get_svi_proizvodi();
        
        $this->view->get_proizvodi = $get_proizovdi;

    }
*/










