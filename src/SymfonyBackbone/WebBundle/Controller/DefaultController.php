<?php

namespace SymfonyBackbone\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller {

    /**
     * @Route("/en/our-work")
     * @Route("/notre-travail")
     */
    public function workAction() {
        return $this->render('SymfonyBackboneWebBundle:Default:index.html.twig');
    }

    /**
     * @Route("/en/labs")
     * @Route("/laboratoires")
     */
    public function labsAction() {
        return $this->render('SymfonyBackboneWebBundle:Default:index.html.twig');
    }

    /**
     * @Route("/en/what-we-do")
     * @Route("/que-fait-on")
     */
    public function whatWeDoAction() {
        return $this->render('SymfonyBackboneWebBundle:Default:index.html.twig');
    }

    /**
     * @Route("/en/about-us")
     * @Route("/a-propos")
     */
    public function aboutUsAction() {
        return $this->render('SymfonyBackboneWebBundle:Default:index.html.twig');
    }

    /**
     * @Route("/en/contact")
     * @Route("/contact")
     */
    public function contactAction() {
        return $this->render('SymfonyBackboneWebBundle:Default:index.html.twig');
    }

    /**
     * @Route("/{_local}", defaults={"_local" = "fr"},requirements={"_local" = "en|fr"})
     */
    public function indexAction($_local) {
        return $this->render('SymfonyBackboneWebBundle:'.$_local.':index.html.twig');
    }
}
