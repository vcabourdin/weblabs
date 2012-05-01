<?php

namespace SymfonyBackbone\WebBundle;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class ControllerListener
{
    protected $_container = null;
    protected $_locale = null;

    public function __construct($container){
        $this->_container = $container;
    }

    public function onKernelController(FilterControllerEvent $event){
        if (HttpKernelInterface::MASTER_REQUEST === $event->getRequestType()) {
            $this->_locale = $this->_container->get('session')->getLocale();
            if(isset($_SERVER['PATH_INFO'])){
                $arrRoute = explode('/',$_SERVER['PATH_INFO']);
                if(isset($arrRoute[0])){
                    $this->_container->get('session')->setLocale($arrRoute[0]);
                    $this->_locale = $this->_container->get('session')->getLocale();
                }
            }

            if(!$this->_locale){
                $this->_container->get('session')->setLocale('fr');
                $this->_locale = $this->_container->get('session')->getLocale();
            }
        }
    }
}
