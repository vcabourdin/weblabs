<?php

namespace SymfonyBackbone\WebBundle;

class ServiceLocal {

    protected $_container = null;
    protected $_locale = null;

    public function __construct($container) {
        $this->_container = $container;
    }

    public function setLocal() {
        $this->_locale = $this->_container->get('session')->getLocale();
        if (isset($_SERVER['PATH_INFO'])) {
            if (substr($_SERVER['PATH_INFO'], 0, 3) == '/en') {
                $this->_container->get('session')->setLocale('en');
                $this->_locale = $this->_container->get('session')->getLocale();
            }
        }

        if (!$this->_locale) {
            $this->_container->get('session')->setLocale('fr');
            $this->_locale = $this->_container->get('session')->getLocale();
        }
    }
}

