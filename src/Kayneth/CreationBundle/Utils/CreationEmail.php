<?php

namespace Kayneth\CreationBundle\Utils;

use FOS\UserBundle\Model\UserManager;
use Kayneth\CreationBundle\Entity\Creation;

class CreationEmail {

    public function __construct(\Swift_Mailer $mailer, UserManager $userManager , $isLocked)
    {
        $this->mailer = $mailer;
        $this->isLocked = (boolean) $isLocked;
        $this->userManager = $userManager;
    }

    private function getEmailsArray() {
        $users = $this->userManager->findUsers();

        $adresses = array();

        foreach ($users as $user)
        {
            $adresses[] = $user->getEmail();
        }

        return $adresses;
    }

    public function sendNotification(Creation $creation) {

        if($this->isLocked == false)
        {
            $message = \Swift_Message::newInstance()
                ->setSubject('Nouvelle création postée')
                ->setFrom('dylan.temboucti@gmail.com')
                ->setTo($this->getEmailsArray())
                ->setBody(
                    $this->renderView(
                    // app/Resources/views/Emails/new_creation.html.twig
                        'Emails/new_creation.html.twig',
                        array('title' => $creation->getTitle(), 'slug' => $creation->getSlug())
                    ),
                    'text/html'
                )
            ;

            $this->mailer->send($message);
        }
    }

}