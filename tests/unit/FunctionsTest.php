<?php

class FunctionsTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        $_SESSION = [];
        $_POST = [];
    }

    public function testEscapeAndClean()
    {
        $this->assertSame('&lt;b&gt;&quot;x&quot;&#039;', Esc('<b>"x"\''));
        $this->assertSame('alert(1)', Clean_String('  <script>alert(1)</script> '));
    }

    public function testUrls()
    {
        $this->assertSame('/Profile/3', Url('Profile/3'));
        $this->assertSame('/assets/IMAGES/logo.png', Asset('assets/IMAGES/logo.png'));
        $this->assertSame('/assets/IMAGES/user-1.png', Asset(null));
        $this->assertSame('https://example.com/a.png', Asset('https://example.com/a.png'));
    }

    public function testTimeAgo()
    {
        $this->assertSame('الآن', Time_Ago(date('Y-m-d H:i:s')));
        $this->assertSame('منذ 3 يوم', Time_Ago(date('Y-m-d H:i:s', strtotime('-3 days'))));
        $this->assertSame('منذ 2 ساعة', Time_Ago(date('Y-m-d H:i:s', strtotime('-2 hours'))));
    }

    public function testFormatPrice()
    {
        $this->assertSame("\u{2066}18 500\u{2069} د.ج", Format_Price(18500));
        $this->assertSame('السعر عند الطلب', Format_Price(null));
    }

    public function testCsrfTokenIsStable()
    {
        $Token = Csrf_Token();
        $this->assertSame(64, strlen($Token));
        $this->assertSame($Token, Csrf_Token());
        $this->assertStringContainsString($Token, Csrf_Field());
    }

    public function testLoginAndLogout()
    {
        Login_User('company', ['id' => '4', 'name' => 'Atlas', 'logo' => 'x.png']);
        $this->assertTrue(Is_Logged_In());
        $this->assertTrue(Is_Logged_In('company'));
        $this->assertFalse(Is_Logged_In('account'));
        $this->assertSame(4, Current_User()['id']);
        $this->assertSame('/Company_Page/4', Own_Page_Url());

        Logout_User();
        $this->assertNull(Current_User());
    }

    public function testFlashMessagesAreShownOnce()
    {
        Flash('success', 'OK');
        $this->assertSame([['type' => 'success', 'message' => 'OK']], Take_Flash_Messages());
        $this->assertSame([], Take_Flash_Messages());
    }

    public function testOldValuesAreEscaped()
    {
        $_POST['name'] = '<x>';
        $this->assertSame('&lt;x&gt;', Old('name'));
        $this->assertSame('default', Old('missing', 'default'));
    }
}
