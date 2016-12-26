<?php

namespace Kayneth\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class KaynethUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
