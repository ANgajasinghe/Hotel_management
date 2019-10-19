<?php

namespace Symfony\Component\Routing\Tests\Fixtures\AnnotationFixtures;

class ActionPathController
{
    /**
     * @Route("/path", name="action")
     */
    public function action()
    {
    }
}
