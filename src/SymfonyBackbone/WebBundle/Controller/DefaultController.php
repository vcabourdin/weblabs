<?php

namespace SymfonyBackbone\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller {

    /**
     * @Route("/en/our-work", name="web_work")
     * @Route("/notre-travail", name="web_travail")
     */
    public function workAction() {
        return $this->render('SymfonyBackboneWebBundle:'.$this->get('session')->getLocale().':work.html.twig');
    }

    /**
     * @Route("/en/labs", name="web_labs")
     * @Route("/laboratoires", name="web_laboratoires")
     */
    public function labsAction() {
        return $this->render('SymfonyBackboneWebBundle:'.$this->get('session')->getLocale().':labs.html.twig');
    }

    /**
     * @Route("/en/what-we-do", name="web_wedo")
     * @Route("/que-fait-on", name="web_onfait")
     */
    public function whatWeDoAction() {
        return $this->render('SymfonyBackboneWebBundle:'.$this->get('session')->getLocale().':wedo.html.twig');
    }

    /**
     * @Route("/en/about-us", name="web_about")
     * @Route("/a-propos", name="web_propos")
     */
    public function aboutUsAction() {
        return $this->render('SymfonyBackboneWebBundle:'.$this->get('session')->getLocale().':about.html.twig');
    }

    /**
     * @Route("/en/contact", name="web_contacten")
     * @Route("/contact", name="web_contactfr")
     */
    public function contactAction() {
        return $this->render('SymfonyBackboneWebBundle:'.$this->get('session')->getLocale().':contact.html.twig');
    }

    /**
     * @Route("/{_local}", defaults={"_local" = "fr"},requirements={"_local" = "en|fr"})
     */
    public function indexAction($_local) {
        return $this->render('SymfonyBackboneWebBundle:'.$this->get('session')->getLocale().':index.html.twig');
    }
}
