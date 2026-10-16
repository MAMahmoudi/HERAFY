<?php

class ControllerTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        Fresh_Test_Database();
    }

    public function testModelLoadsAnExistingModel()
    {
        $Controller = new \app\core\Controller();
        $this->assertInstanceOf(Service::class, $Controller->model('Service'));
    }

    public function testModelReturnsNullForAnUnknownModel()
    {
        $Controller = new \app\core\Controller();
        $this->assertNull($Controller->model('test'));
        $this->assertNull($Controller->model('../core/App'));
    }

    public function testViewRendersTheHomePage()
    {
        require_once(My_App_Path . '/controllers/Home.php');
        ob_start();
        (new Home)->index();
        $Html = ob_get_clean();

        $this->assertStringContainsString('الخدمات الأكثر طلبا', $Html);
        $this->assertStringContainsString('هواري بن عودة', $Html);
    }
}
