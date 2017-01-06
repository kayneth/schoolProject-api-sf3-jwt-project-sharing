<?php

namespace Kayneth\UserBundle\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTAuthenticatedEvent;
use Symfony\Component\Security\Core\User\UserInterface;

class JWTAuthenticatedListener {

    /**
     * @param JWTAuthenticatedEvent $event
     *
     * @return void
     */
    public function onJWTAuthenticated(JWTAuthenticatedEvent $event)
    {
        /*$token = $event->getToken();
        $payload = $event->getPayload();

        $token->setAttribute('uuid', $payload['uuid']);*/
    }
}