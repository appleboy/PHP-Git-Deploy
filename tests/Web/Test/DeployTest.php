<?php

namespace Web\Test;
use Web\Deploy;

class DeployTest extends \PHPUnit_Framework_TestCase
{
    private $deploy;

    protected function setUp()
    {
        $this->deploy = new Deploy();
        
        $payload = array(
            'repository' => array('name' => 'test'),
            'ref' => 'master'    
        );
        $_POST['payload'] = json_encode($payload);
    }
    
    public function testindex()
    {
        $this->assertTrue(true, $this->deploy->index());
    }
}