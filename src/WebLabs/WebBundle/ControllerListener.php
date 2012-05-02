<?php

namespace WebLabs\WebBundle;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

class ControllerListener {

    protected $_serviceLocal = null;
    protected $_router = null;

    public function __construct($sLocal) {
        $this->_serviceLocal = $sLocal;
    }

    public function onKernelController(FilterControllerEvent $event) {
        if (HttpKernelInterface::MASTER_REQUEST === $event->getRequestType()) {
            $this->_serviceLocal->setLocal();
        }
    }

}
