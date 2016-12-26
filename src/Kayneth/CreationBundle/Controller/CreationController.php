<?php

namespace Kayneth\CreationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Routing\ClassResourceInterface;

class CreationController extends Controller implements ClassResourceInterface
{
    public function cgetAction()
    {
        $em = $this->getDoctrine()->getManager();
        $creations = $em
            ->getRepository('KaynethCreationBundle:Creation')
            ->findAll();
        ;

        return array('creations' => $creations);
    }

    public function getAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $creation = $em
            ->getRepository('KaynethCreationBundle:Creation')
            ->findOneBySlug($slug);
        ;

        return array('creation' => $creation);
    }

    public function postUsersAction()
    {

    }

    public function putAction($slug)
    {

    }
}