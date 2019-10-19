<?php

namespace Symfony\Component\Routing\Tests\Fixtures\AnnotationFixtures;

/**
 * @Route("/here", name="lol", methods={"GET", "POST"}, schemes={"https"})
 */
class InvokableController
{
    public function __invoke()
    {
    }
}
