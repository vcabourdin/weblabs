<?php

namespace WebLabs\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller {

    /**
     * @Route("/change-language/{lang}", name="weblabs_language", defaults={"lang"="fr"})
     * @Route("/change-langue/{lang}", name="weblabs_langue", defaults={"lang"="fr"})
     */
    public function langAction($lang) {
        $local = $this->get('weblabs_service_local');
        return $this->redirect($local->extractTranslationRoute($this,$lang,$_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST']));
    }

    /**
     * @Route("/our-work", name="weblabs_work")
     * @Route("/notre-travail", name="weblabs_travail")
     */
    public function workAction() {
        return $this->render('WebLabsWebBundle:' . $this->get('session')->getLocale() . ':work.html.twig');
    }

    /**
     * @Route("/labs", name="weblabs_labs")
     * @Route("/laboratoires", name="weblabs_laboratoires")
     */
    public function labsAction() {
        return $this->render('WebLabsWebBundle:' . $this->get('session')->getLocale() . ':labs.html.twig');
    }

    /**
     * @Route("/what-we-do", name="weblabs_wedo")
     * @Route("/que-fait-on", name="weblabs_onfait")
     */
    public function whatWeDoAction() {
        return $this->render('WebLabsWebBundle:' . $this->get('session')->getLocale() . ':wedo.html.twig');
    }

    /**
     * @Route("/about-us", name="weblabs_about")
     * @Route("/a-propos", name="weblabs_propos")
     */
    public function aboutUsAction() {
        return $this->render('WebLabsWebBundle:' . $this->get('session')->getLocale() . ':about.html.twig');
    }

    /**
     * @Route("/contactus", name="weblabs_contacten")
     * @Route("/contact", name="weblabs_contactfr")
     */
    public function contactAction() {
        return $this->render('WebLabsWebBundle:' . $this->get('session')->getLocale() . ':contact.html.twig');
    }

    /**
     * @Route("/", name="weblabs_homepage")
     */
    public function indexAction() {
        return $this->render('WebLabsWebBundle:' . $this->get('session')->getLocale() . ':index.html.twig');
    }

}
