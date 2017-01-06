<?php

namespace Kayneth\UserBundle\EventListener;

use Kayneth\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\User\UserInterface;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTDecodedEvent;

class JWTDecodedListener {

    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var User
     */
    private $user;

    /**
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack, TokenStorage $securityTokenStorage)
    {
        $this->requestStack = $requestStack;
        //$this->user = $securityTokenStorage->getToken()->getUser();
    }

    /**
     * @param JWTDecodedEvent $event
     *
     * @return void
     */
    public function onJWTDecoded(JWTDecodedEvent $event)
    {
        $request = $this->requestStack->getCurrentRequest();

        $payload = $event->getPayload();

        if (!isset($payload['ip']) || $payload['ip'] !== $request->getClientIp()) {
            $event->markAsInvalid();
        }
//        if (!isset($payload['roles']) || $payload['roles'] !== $this->user->getRoles()) {
//            $event->markAsInvalid();
//        }
    }
}