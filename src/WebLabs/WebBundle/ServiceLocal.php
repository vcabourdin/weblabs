<?php

namespace WebLabs\WebBundle;

use  Symfony\Component\HttpFoundation\RedirectResponse;

class ServiceLocal {

    protected $_container = null;
    protected $_locale = null;

    public function __construct($container) {
        $this->_container = $container;
    }

    public function setLocal() {
        $this->_locale = $this->_container->get('session')->getLocale();
        if (isset($_GET['lang'])) {
            if ($_GET['lang'] == 'fr' || $_GET['lang'] == 'en') {
                $this->_container->get('session')->setLocale($_GET['lang']);
                $this->_locale = $this->_container->get('session')->getLocale();
            }
        }

        if (!$this->_locale) {
            $this->_container->get('session')->setLocale('fr');
            $this->_locale = $this->_container->get('session')->getLocale();
        }
    }

}

