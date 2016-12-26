<?php

namespace Kayneth\CreationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Routing\ClassResourceInterface;

class CommentController extends Controller implements ClassResourceInterface
{
    public function cgetAction()
    {
        $em = $this->getDoctrine()->getManager();
        $creations = $em
            ->getRepository('KaynethCreationBundle:Comment')
            ->findBy(array(''));
        ;
    }

    public function getAction($slug)
    {

    }

    public function postUsersAction()
    {

    }

    public function putAction($slug)
    {

    }
}