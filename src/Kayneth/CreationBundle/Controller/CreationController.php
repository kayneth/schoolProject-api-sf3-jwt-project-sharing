<?php

namespace Kayneth\CreationBundle\Controller;

use Kayneth\CreationBundle\Entity\Creation;
use Kayneth\CreationBundle\Form\CreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;

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

    public function postAction(Request $request)
    {
        $creation = new Creation();
        $creation->setCreatedAt(new \Datetime());
        $form = $this->createForm(CreationType::class, $creation);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($creation);
            $em->flush();
        }

        return array('creation' => $creation);
    }

    public function putAction(Request $request, Creation $creation)
    {
        $creation = new Creation();
        $creation->setCreatedAt(new \Datetime());
        $form = $this->createForm(CreationType::class, $creation);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($creation);
            $em->flush();
        }

        return array('creation' => $creation);
    }
}