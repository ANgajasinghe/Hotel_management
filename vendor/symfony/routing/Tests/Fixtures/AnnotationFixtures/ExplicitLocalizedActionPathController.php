<?php

namespace Symfony\Component\Routing\Tests\Fixtures\AnnotationFixtures;

class ExplicitLocalizedActionPathController
{
    /**
     * @Route(path={"en": "/path", "nl": "/pad"}, name="action")
     */
    public function action()
    {
    }
}
