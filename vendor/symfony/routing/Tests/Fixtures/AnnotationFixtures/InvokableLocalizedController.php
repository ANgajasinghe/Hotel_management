<?php

namespace Symfony\Component\Routing\Tests\Fixtures\AnnotationFixtures;

/**
 * @Route(path={"nl": "/hier", "en": "/here"}, name="action")
 */
class InvokableLocalizedController
{
    public function __invoke()
    {
    }
}
