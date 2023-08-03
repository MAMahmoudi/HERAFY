<?php

require_once('./app/core/utils/EmailAddress.php');
//require_once('./vendor/phpunit/phpunit/src/Framework/testcase.php');

class EmailAddressTest extends \PHPUnit\Framework\TestCase
{
    protected $EmailAddress;

    public function setUp(): void
    {
        $this->EmailAddress = new \app\core\utils\EmailAddress("mohamed.mahmoudi@ensia.edu.dz");
    }
    public function __constructor($name)
    {
        parent::__construct($name);
    }

    function testLocalPart()
    {
        // check that the local part of the address is equal to ‘george’
        $this->assertTrue($this->EmailAddress->localPart == 'mohamed.mahmoudi');
    }
    public function testDomain()
    {
        $this->assertEquals($this->EmailAddress->domain, 'ensia.edu.dz');
    }
}

// require_once "PHPUnit/Framework/TestSuite";
// $suite = new \PHPUnit\Framework\TestSuite("EmailAddressTest");
// $suite->addTest(new EmailAddressTest('testLocalPart'));

// require_once "PHPUnit/TextUI/TestRunner";
// $runner = (new \PHPUnit\TextUI\TestRunner())->run($suite);
// PHPUnit\TextUI\TestRunner::run($suite);
