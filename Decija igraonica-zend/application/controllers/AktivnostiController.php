<?php

class AktivnostiController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $this->view->Naslov = "Aktivnosti";
        $aktivnostMapper = new Application_Model_Aktivnost();
        $aktivnosti = $aktivnostMapper->getAktivnosti();
        //$this->view->aktivnosti=$aktivnosti;

        $paginator = Zend_Paginator::factory($aktivnosti);
        $paginator->setDefaultItemCountPerPage(3);
        $allItems = $paginator->getTotalItemCount();
        $countPages = $paginator->count();
        $p = $this->getRequest()->getParam('strana');
        if (isset($p)) {
            $paginator->setCurrentPageNumber($p);
        } else {
            $paginator->setCurrentPageNumber(1);
        }
        $currentPage = $paginator->getCurrentPageNumber();
        $this->view->aktivnosti = $paginator;
        $this->view->countItems = $allItems;
        $this->view->countPages = $countPages;
        $this->view->currentPage = $currentPage;
        if ($currentPage == $countPages) {
            $this->view->nextPage = $countPages;
            $this->view->previousPage = $currentPage - 1;
        } else if ($currentPage == 1) {
            $this->view->nextPage = $currentPage + 1;
            $this->view->previousPage = 1;
        } else {
            $this->view->nextPage = $currentPage + 1;
            $this->view->previousPage = $currentPage - 1;
        }
    }

    public function prikazAction() {
        $id = $this->getRequest()->getParam('id');
        if (!isset($id))
            $this->_redirect('/aktivnosti');




        $aktivnostMapper = new Application_Model_Aktivnost();
        $aktivnost = $aktivnostMapper->getAktivnost($id);
        $oldkomentari= new Application_Model_Komentar();
        $komentari=$oldkomentari->getKomentari($aktivnost['id']);
        $logovan = Zend_Auth::getInstance();
        $user=$logovan->getIdentity()->ime;
        $request = $this->getRequest();
        $komentarforma = new Application_Form_Komentar();
        if ($request->isPost() && $komentarforma->isValid($request->getPost())) {

            $post = $this->getRequest()->getParams();
            $oldkomentari->setKomentar($user,$post,$aktivnost['id']);
            $this->_redirect('/aktivnosti/prikaz/id/' . $aktivnost['id']);
        }
        $slikemodel=new Application_Model_Slike();
        $slike=$slikemodel->getslike($id);

        $this->view->Naslov = $aktivnost['ime'];
        $this->view->aktivnost = $aktivnost;
        $this->view->slike=$slike;
        $this->view->komentari = $komentari;
        $this->view->komentar = $komentarforma;


        if ($logovan->hasIdentity()) {
            
            //$this->view->komentari = $user;
        } else {
            $this->view->komentar= 'Da biste komentarisali morate se ulogvati.';
        }
    }

}
