<?php

namespace Symfony\Component\Routing\Tests\Fixtures\AnnotationFixtures;

/**
 * @Route(path={"en": "/en", "nl": "/nl"})
 */
class LocalizedPrefixWithRouteWithoutLocale
{
    /**
     * @Route("/suffix", name="action")
     */
    public function action()
    {
    }
}
