<?php

namespace Kayneth\CreationBundle\Controller;

use Kayneth\CreationBundle\Entity\Comment;
use Kayneth\CreationBundle\Entity\Creation;
use Kayneth\CreationBundle\Entity\Score;
use Kayneth\CreationBundle\Form\CommentType;
use Kayneth\CreationBundle\Form\ScoreType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;

class ScoreController extends Controller implements ClassResourceInterface
{
    public function cgetAction(Creation $creation)
    {
        $em = $this->getDoctrine()->getManager();
        return $scores = $em
            ->getRepository('KaynethCreationBundle:Score')
            ->findBy(array(''))
        ;
    }

    public function getAction($slug)
    {

    }

    public function postAction(Request $request)
    {
        $score = new Score();
        $score->setUser($this->getUser());
        $form = $this->createForm(ScoreType::class, $score);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($score);
            $em->flush();
            return array('score' => $score);
        }else{
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);


            return $this->json(array(
                'status' => 'error',
                'errors' => $errors
            ), 400);
        }
    }
}