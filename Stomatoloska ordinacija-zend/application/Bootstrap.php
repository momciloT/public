<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    function _initViewHelpers() {
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();

        $view->setHelperPath(APPLICATION_PATH . '/helpers', '');
        ZendX_JQuery::enableView($view);
        $view->headTitle('Zuba');

        $view->headMeta()->appendHttpEquiv('Content-type', 'text/html;charset=utf-8');

        $view->headLink()->appendStylesheet('/bower_components/bootstrap/dist/css/bootstrap.min.css');
        $view->headLink()->appendStylesheet('/bower_components/metisMenu/dist/metisMenu.min.css');
        $view->headLink()->appendStylesheet('/dist/css/timeline.css');
        $view->headLink()->appendStylesheet('/dist/css/sb-admin-2.css');
        $view->headLink()->appendStylesheet('/font-awesome/css/font-awesome.min.css');
        $view->headLink()->appendStylesheet('/bower_components/morrisjs/morris.css');
        $view->headLink()->appendStylesheet('/proba.css');

        $view->headScript()->appendFile('/bower_components/bootstrap/dist/js/bootstrap.min.js');
        $view->headScript()->appendFile('/bower_components/metisMenu/dist/metisMenu.min.js');
        // Custom Theme JavaScript
        $view->headScript()->appendFile('/dist/js/sb-admin-2.js');
        //jQuery -ne radi sa metisMenu
        // $view->headScript()->appendFile('/bower_components/jquery/dist/jquery.min.js');
        //Morris Charts JavaScript
        $view->headScript()->appendFile('/bower_components/raphael/raphael-min.js');
        //<script src="/../dist/js/sb-admin-2.js"></script>
        // $view->headScript()->prependFile($this->baseUrl() . '/bower_components/metisMenu/dist/metisMenu.min.js');
    }

}
