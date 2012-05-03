<?php

namespace WebLabs\WebBundle;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\Session;

class ServiceLocal {
    protected $_router = null;
    protected $_session = null;

    public function __construct(Router $router,Session $session) {
        $this->_router = $router;
        $this->_session = $session;
    }

    public function extractTranslationRoute($oController,$lang,$referer,$host) {
        $routes = array();
        $referer = str_replace('http://' . $host, '', $referer);
        $referer = str_replace('https://' . $host, '', $referer);

        $index = 0;
        $controller = '';
        $url = '/';
        foreach ($this->_router->getRouteCollection()->all() as $name => $route) {
            if (substr($name, 0, 8) == 'weblabs_') {
                $url = $oController->generateUrl($name);
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


        $this->_session->setLocale($lang);
        return $url;
    }

}

