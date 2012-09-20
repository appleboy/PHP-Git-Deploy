<?php

include('deploy');

namespace Web\Test;

class DeployTest extends \PHPUnit_Framework_TestCase
{
    private $deploy;

    protected function setUp()
    {
        $this->deploy = new Deploy();
        echo $this->deploy->hello();
    }

    public function testHelloWorld()
    {
        $this->assertEquals('Hello World', 'Hello World');
    }
}