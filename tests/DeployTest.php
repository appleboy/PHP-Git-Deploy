<?php

include_once('deploy');

class DeployTest extends PHPUnit_Framework_TestCase
{
    public function testHelloWorld()
    {
        $this->assertEquals('Hello World', \Web\Deploy::hello());
    }
}