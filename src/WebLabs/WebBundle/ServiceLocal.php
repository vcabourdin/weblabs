<?php

namespace WebLabs\WebBundle;

use  Symfony\Component\HttpFoundation\RedirectResponse;

class ServiceLocal {

    protected $_container = null;
    protected $_session = null;
    protected $_locale = null;

    public function __construct($container) {
        $this->_container = $container;
        $this->_session = $this->_container->get('session');
    }

    public function setLocal() {
        $this->_locale = $this->_session->getLocale();

        if (!$this->_locale) {
            $this->_session->setLocale('fr');
            $this->_locale = $this->_session->getLocale();
        }
    }

}

