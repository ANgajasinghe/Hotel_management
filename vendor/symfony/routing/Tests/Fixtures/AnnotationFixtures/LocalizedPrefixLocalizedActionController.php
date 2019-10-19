<?php

namespace Symfony\Component\Routing\Tests\Fixtures\AnnotationFixtures;

/**
 * @Route(path={"nl": "/nl", "en": "/en"})
 */
class LocalizedPrefixLocalizedActionController
{
    /**
     * @Route(path={"nl": "/actie", "en": "/action"}, name="action")
     */
    public function action()
    {
    }
}
