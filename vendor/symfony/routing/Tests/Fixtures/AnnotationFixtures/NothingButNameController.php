<?php

namespace Symfony\Component\Routing\Tests\Fixtures\AnnotationFixtures;

class NothingButNameController
{
    /**
     * @Route(name="action")
     */
    public function action()
    {
    }
}
