<?php

namespace Kayneth\CreationBundle\DoctrineListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Kayneth\CreationBundle\Entity\Creation;
use Kayneth\FileBundle\Entity\File;

class CreationListener
{

    public function __construct()
    {

    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        $isInstanceOfCreation = $entity instanceof Creation;
        $isInstanceOfFile = $entity instanceof File;

        if ( $isInstanceOfCreation != true) {
            return;
        }
        $entity->setImageDir();
        $entity->getImage()->upload();



    }
}
