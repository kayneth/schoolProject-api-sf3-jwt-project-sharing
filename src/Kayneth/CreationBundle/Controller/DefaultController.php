<?php

namespace Kayneth\CreationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KaynethCreationBundle:Default:index.html.twig');
    }
}
