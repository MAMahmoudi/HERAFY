<?php

require_once('./app/core/utils/EmailAddress.php');
//require_once('./vendor/phpunit/phpunit/src/Framework/testcase.php');

class EmailAddressTest extends \PHPUnit\Framework\TestCase
{
    public function __constructor($name)
    {
        parent::__construct($name);
    }
    function testLocalPart()
    {
        $email = new EmailAddress("mohamed.mahmoudi@ensia.edu.dz");
        // check that the local part of the address is equal to ‘george’
        $this->assertTrue($email->localPart == 'mohamed.mahmoudi');
    }
    public function testDomain()
    {
        $email = new EmailAddress("mohamed.mahmoudi@ensia.edu.dz");
        $this->assertEquals($email->domain, 'ensia.edu.dz');
    }
}

// require_once "PHPUnit/Framework/TestSuite";
// $suite = new \PHPUnit\Framework\TestSuite("EmailAddressTest");
// $suite->addTest(new EmailAddressTest('testLocalPart'));

// require_once "PHPUnit/TextUI/TestRunner";
// $runner = (new \PHPUnit\TextUI\TestRunner())->run($suite);
// PHPUnit\TextUI\TestRunner::run($suite);
