<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    function _initViewHelpers(){
        $this->bootstrap('layout');
        $layout= $this->getResource('layout');
        $view=$layout->getView();
     
        $view->headLink()->appendStylesheet('/css/default.css');
        $view->headLink()->appendStylesheet('/css/lightbox.css');
        //$view->headScript()->appendFile('/js/lightbox-plus-jquery.js');
        $view->headMeta()->appendHttpEquiv('Content-type','text/html;charset=utf-8');
        $view->headTitle()->setSeparator(' - ');
        $view->headTitle('Dečija igraonica MIKI');
        
    }

}

