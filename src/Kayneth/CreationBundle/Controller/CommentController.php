<?php

namespace Kayneth\CreationBundle\Controller;

use Kayneth\CreationBundle\Entity\Comment;
use Kayneth\CreationBundle\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;

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

    public function postAction(Request $request)
    {
        $serializer = $this->get('jms_serializer');
        $content = $request->getContent();

        /**
         * @var Comment $comment
         */
        $comment = $serializer->deserialize($content, Comment::class, 'json');

        $validator = $this->get('validator');
        $errors = $validator->validate($comment);

        if (count($errors) <= 0) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();
            return array('comment' => $comment);
        }else{

            return array(
                'status' => 'error',
                'errors' => $errors
            );
        }
    }

    public function putAction(Request $request, Comment $comment)
    {
        $form = $this->createForm(CommentType::class, $comment);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();
            return array('comment' => $comment);
        }else{
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);

            return array(
                'status' => 'error',
                'errors' => $errors
            );
        }
    }
}