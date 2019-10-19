<?php

namespace PharIo\Manifest;

use DOMDocument;
use PHPUnit\Framework\TestCase;

class ComponentElementTest extends TestCase
{
    /**
     * @var ComponentElement
     */
    private $component;

    public function testNameCanBeRetrieved()
    {
        $this->assertEquals('phar-io/phive', $this->component->getName());
    }

    public function testEmailCanBeRetrieved()
    {
        $this->assertEquals('0.6.0', $this->component->getVersion());
    }

    protected function setUp()
    {
        $dom = new DOMDocument();
        $dom->loadXML('<?xml version="1.0" ?><component xmlns="https://phar.io/xml/manifest/1.0" name="phar-io/phive" version="0.6.0" />');
        $this->component = new ComponentElement($dom->documentElement);
    }

}
