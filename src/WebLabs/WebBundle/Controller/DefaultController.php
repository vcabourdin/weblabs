<?php

namespace WebLabs\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller {

    /**
     * @Route("/our-work", name="web_work")
     * @Route("/notre-travail", name="web_travail")
     */
    public function workAction() {
        return $this->render('WebLabsWebBundle:'.$this->get('session')->getLocale().':work.html.twig');
    }

    /**
     * @Route("/labs", name="web_labs")
     * @Route("/laboratoires", name="web_laboratoires")
     */
    public function labsAction() {
        return $this->render('WebLabsWebBundle:'.$this->get('session')->getLocale().':labs.html.twig');
    }

    /**
     * @Route("/what-we-do", name="web_wedo")
     * @Route("/que-fait-on", name="web_onfait")
     */
    public function whatWeDoAction() {
        return $this->render('WebLabsWebBundle:'.$this->get('session')->getLocale().':wedo.html.twig');
    }

    /**
     * @Route("/about-us", name="web_about")
     * @Route("/a-propos", name="web_propos")
     */
    public function aboutUsAction() {
        return $this->render('WebLabsWebBundle:'.$this->get('session')->getLocale().':about.html.twig');
    }

    /**
     * @Route("/contactus", name="web_contacten")
     * @Route("/contact", name="web_contactfr")
     */
    public function contactAction() {
        return $this->render('WebLabsWebBundle:'.$this->get('session')->getLocale().':contact.html.twig');
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction() {
        return $this->render('WebLabsWebBundle:'.$this->get('session')->getLocale().':index.html.twig');
    }
}
