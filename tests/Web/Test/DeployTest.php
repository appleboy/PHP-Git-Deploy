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
    
    public function testindex()
    {
        $this->assertTrue(true, $this->deploy->index());
    }
}