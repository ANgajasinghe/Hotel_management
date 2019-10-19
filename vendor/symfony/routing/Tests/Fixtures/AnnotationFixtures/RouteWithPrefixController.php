<?php

namespace Symfony\Component\Routing\Tests\Fixtures\AnnotationFixtures;

/**
 * @Route("/prefix")
 */
class RouteWithPrefixController
{
    /**
     * @Route("/path", name="action")
     */
    public function action()
    {
    }
}
