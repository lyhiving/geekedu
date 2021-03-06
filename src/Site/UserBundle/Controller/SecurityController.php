<?php
namespace Site\UserBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\UserBundle\Controller\SecurityController  as BaseController;

class SecurityController extends BaseController
{
    protected function renderLogin(array $data)
    {
        $requestAttributes = $this->container->get('request')->attributes;
        if ($requestAttributes->get('_route') == 'admin_login') {
            $template = 'AdminUserBundle:Security:login.html.twig';
        } elseif($this->container->get('request')->isXmlHttpRequest()) {
            $template = 'SiteUserBundle:Security:login_content.html.twig';
        }else{
            $template = 'SiteUserBundle:Security:login.html.twig';
        }
        return $this->container->get('templating')->renderResponse($template, $data);
    }

}
