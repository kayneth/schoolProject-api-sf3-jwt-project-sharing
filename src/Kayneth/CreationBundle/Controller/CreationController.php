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

    public function getAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $creation = $em
            ->getRepository('KaynethCreationBundle:Creation')
            ->findOneBySlug($slug);
        ;

        return array('creation' => $creation);
    }

    public function postAction(Request $request)
    {
        $creation = new Creation();
        $form = $this->createForm(CreationType::class, $creation);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($creation);
            $em->flush();
            return array('creation' => $creation);
        }else{
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);

            return array(
                'status' => 'error',
                'errors' => $errors
            );
        }
    }

    public function putAction(Request $request, Creation $creation)
    {
        $form = $this->createForm(CreationType::class, $creation);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($creation);
            $em->flush();
            return array('creation' => $creation);
        }else{
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);

            return array(
                'status' => 'error',
                'errors' => $errors
            );
        }
    }
}