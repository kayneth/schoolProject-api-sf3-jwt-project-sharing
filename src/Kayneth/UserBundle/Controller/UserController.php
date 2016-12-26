<?php

namespace Kayneth\UserBundle\Controller;

use Kayneth\CreationBundle\Entity\Creation;
use Kayneth\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Routing\ClassResourceInterface;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\Request;

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

    public function postUsersAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }

        return array('user' => $user);
    }

    public function putAction(Request $request, User $user)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }

        return array('user' => $user);
    }
}