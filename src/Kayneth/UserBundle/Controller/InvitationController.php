<?php

namespace Kayneth\UserBundle\Controller;

use Kayneth\CreationBundle\Entity\Creation;
use Kayneth\UserBundle\Entity\Invitation;
use Kayneth\UserBundle\Entity\User;
use Kayneth\UserBundle\Form\InvitationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Routing\ClassResourceInterface;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class InvitationController extends Controller implements ClassResourceInterface
{

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function cgetAction()
    {
        $em = $this->getDoctrine()->getManager();
        $invitations = $em
            ->getRepository('KaynethUserBundle:Invitation')
            ->findAll();
        ;

        return array('invitations' => $invitations);
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function postAction(Request $request)
    {
        $invitation = new Invitation();
        $form = $this->createForm(InvitationType::class, $invitation);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($invitation);
            $em->flush();

            return array('invitation' => $invitation);
        }else{
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);

            return array(
                'status' => 'error',
                'errors' => $errors
            );
        }
    }
}