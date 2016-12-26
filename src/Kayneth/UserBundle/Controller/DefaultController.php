<?php

namespace Kayneth\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KaynethUserBundle:Default:index.html.twig');
    }
}
