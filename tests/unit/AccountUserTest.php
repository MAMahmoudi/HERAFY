<?php

class AccountUserTest extends \PHPUnit\Framework\TestCase
{
    private $Valid_Data = [
        'first_name' => 'Mohamed',
        'last_name' => 'Mahmoudi',
        'email' => 'New.Craftsman@Herafy.dz',
        'password' => 'secret-password',
        'password_confirm' => 'secret-password',
        'service_id' => '1',
        'city' => 'Oran',
        'phone' => '0550 00 00 00',
    ];

    protected function setUp(): void
    {
        Fresh_Test_Database();
    }

    public function testValidDataIsAccepted()
    {
        $Account_User = new Account_User;
        $this->assertTrue($Account_User->Verify_My_Data($this->Valid_Data), implode(', ', $Account_User->My_Errors));
    }

    public function testMissingFieldsAreReported()
    {
        $Account_User = new Account_User;
        $this->assertFalse($Account_User->Verify_My_Data([]));
        $this->assertEqualsCanonicalizing(
            ['first_name', 'last_name', 'email', 'password', 'password_confirm'],
            array_keys($Account_User->My_Errors)
        );
    }

    public function testPasswordsMustMatchAndBeLongEnough()
    {
        $Account_User = new Account_User;
        $this->assertFalse($Account_User->Verify_My_Data(['password' => 'short', 'password_confirm' => 'other'] + $this->Valid_Data));
        $this->assertArrayHasKey('password', $Account_User->My_Errors);
        $this->assertArrayHasKey('password_confirm', $Account_User->My_Errors);
    }

    public function testEmailMustBeUnique()
    {
        $Account_User = new Account_User;
        $this->assertFalse($Account_User->Verify_My_Data(['email' => 'HOUARI@herafy.dz'] + $this->Valid_Data));
        $this->assertArrayHasKey('email', $Account_User->My_Errors);
    }

    public function testUnknownServiceIsRefused()
    {
        $Account_User = new Account_User;
        $this->assertFalse($Account_User->Verify_My_Data(['service_id' => '999'] + $this->Valid_Data));
        $this->assertArrayHasKey('service_id', $Account_User->My_Errors);
    }

    public function testUpdateDoesNotRequireThePassword()
    {
        $Account_User = new Account_User;
        $Data = $this->Valid_Data;
        unset($Data['password'], $Data['password_confirm'], $Data['email']);
        $this->assertTrue($Account_User->Verify_My_Data($Data, true));
    }

    public function testRegisterHashesThePasswordAndAuthenticates()
    {
        $Account_User = new Account_User;
        $id = $Account_User->Register($this->Valid_Data);
        $Row = $Account_User->Find_By_Id($id);

        $this->assertSame('new.craftsman@herafy.dz', $Row['email']);
        $this->assertNotSame('secret-password', $Row['password_hash']);
        $this->assertSame($id, (int)$Account_User->Authenticate('NEW.craftsman@herafy.dz ', 'secret-password')['id']);
        $this->assertFalse($Account_User->Authenticate('new.craftsman@herafy.dz', 'wrong-password'));
        $this->assertFalse($Account_User->Authenticate('nobody@herafy.dz', 'secret-password'));
    }

    public function testDemoAccountsCanLogIn()
    {
        $this->assertNotFalse((new Account_User)->Authenticate('houari@herafy.dz', 'herafy123'));
        $this->assertNotFalse((new Company_User)->Authenticate('info@outils.dz', 'herafy123'));
    }

    public function testSearchCraftsmen()
    {
        $Account_User = new Account_User;
        $Carpenter_Id = (new Service)->Single_Result(['slug' => 'carpenter'])['id'];

        $By_Service = $Account_User->Search_Craftsmen('', $Carpenter_Id);
        $this->assertCount(1, $By_Service);
        $this->assertSame('houari@herafy.dz', $By_Service[0]['email']);

        $this->assertCount(1, $Account_User->Search_Craftsmen('سباك'));
        $this->assertCount(1, $Account_User->Search_Craftsmen('', null, 'وهران'));
        $this->assertCount(6, $Account_User->Search_Craftsmen());
        $this->assertSame([], $Account_User->Search_Craftsmen('nothing matches this'));
    }

    public function testProfileViews()
    {
        $Account_User = new Account_User;
        $Before = (int)$Account_User->Find_By_Id(1)['profile_views'];
        $Account_User->Add_Profile_View(1);
        $this->assertSame($Before + 1, (int)$Account_User->Find_By_Id(1)['profile_views']);
    }
}
