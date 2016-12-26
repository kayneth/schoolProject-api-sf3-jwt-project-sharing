<?php

namespace Kayneth\FileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KaynethFileBundle:Default:index.html.twig');
    }
}
