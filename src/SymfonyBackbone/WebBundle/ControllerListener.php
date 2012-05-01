<?php

namespace SymfonyBackbone\WebBundle;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class ControllerListener
{
    protected $_serviceLocal = null;

    public function __construct($sLocal){
        $this->_serviceLocal = $sLocal;
    }

    public function onKernelController(FilterControllerEvent $event){
        if (HttpKernelInterface::MASTER_REQUEST === $event->getRequestType()) {
            $this->_serviceLocal->setLocal();
        }
    }
}
