<?php

namespace Kayneth\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Routing\ClassResourceInterface;

use FOS\RestBundle\Controller\Annotations\View;

class UserController extends Controller implements ClassResourceInterface
{

    public function cgetAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em
            ->getRepository('KaynethUserBundle:User')
            ->findAll();
        ;

        return array('users' => $users);
    }

    public function getAction($username)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em
            ->getRepository('KaynethUserBundle:User')
            ->findOneByUsername($username);
        ;

        return array('user' => $user);
    }

    public function postUsersAction()
    {

    }

    public function putAction($slug)
    {

    }
}