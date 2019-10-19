<?php

namespace PharIo\Manifest;

use DOMDocument;
use PHPUnit\Framework\TestCase;

class ExtElementTest extends TestCase
{
    /**
     * @var ExtElement
     */
    private $ext;

    public function testNameCanBeRetrieved()
    {
        $this->assertEquals('dom', $this->ext->getName());
    }

    protected function setUp()
    {
        $dom = new DOMDocument();
        $dom->loadXML('<?xml version="1.0" ?><ext xmlns="https://phar.io/xml/manifest/1.0" name="dom" />');
        $this->ext = new ExtElement($dom->documentElement);
    }

}
