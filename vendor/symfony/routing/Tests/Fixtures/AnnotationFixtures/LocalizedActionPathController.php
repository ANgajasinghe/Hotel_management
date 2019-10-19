<?php

namespace Symfony\Component\Routing\Tests\Fixtures\AnnotationFixtures;

class LocalizedActionPathController
{
    /**
     * @Route(path={"en": "/path", "nl": "/pad"}, name="action")
     */
    public function action()
    {
    }
}
