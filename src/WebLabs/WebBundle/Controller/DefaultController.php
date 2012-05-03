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
        $routes = array();
        $referer = str_replace('http://' . $_SERVER['HTTP_HOST'], '', $_SERVER['HTTP_REFERER']);
        $referer = str_replace('https://' . $_SERVER['HTTP_HOST'], '', $referer);

        $index = 0;
        $controller = '';
        $url = '/';
        foreach ($this->get('router')->getRouteCollection()->all() as $name => $route) {
            if (substr($name, 0, 8) == 'weblabs_') {
                $url = $this->generateUrl($name);
                $default = $route->getDefaults();
                $routes[$index]['name'] = $name;
                $routes[$index]['url'] = $url;
                $routes[$index]['pattern'] = $route->getPattern();
                $routes[$index]['prefix'] = $route->compile()->getStaticPrefix();
                $routes[$index]['controller'] = $default['_controller'];

                if ($referer == $url) {
                    $controller = $routes[$index]['controller'];
                }
                $index++;
            }
        }
        foreach($routes as $route){
            if($route['controller'] == $controller && $route['url'] != $referer){
                $url = $route['url'];
            }
        }
        $this->get('session')->setLocale($lang);
        return $this->redirect($url);
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
