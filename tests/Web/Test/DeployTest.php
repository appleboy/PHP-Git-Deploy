<?php

namespace Web\Test;
use Web\Deploy;

class DeployTest extends \PHPUnit_Framework_TestCase
{
    private $deploy;

    protected function setUp()
    {
        $this->deploy = new Deploy();
    }

    public function testhello()
    {
        $this->assertEquals('Hello World', $this->deploy->hello());
    }
    
    public function testindex()
    {
        $this->assertEquals('Compeletly', $this->deploy->index());
    }
}