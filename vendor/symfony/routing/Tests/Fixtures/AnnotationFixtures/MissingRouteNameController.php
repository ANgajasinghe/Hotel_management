<?php

namespace Symfony\Component\Routing\Tests\Fixtures\AnnotationFixtures;

class MissingRouteNameController
{
    /**
     * @Route("/path")
     */
    public function action()
    {
    }
}
