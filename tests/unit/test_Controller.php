<?php

require('./app/core/Controller.php');


class test_Controller extends \PHPUnit\Framework\TestCase
{
    protected $Controller;

    protected function setUp(): void
    {
        $this->Controller = new \app\core\Controller();
    }
    public function test_view()
    {
        $this->assertNull($this->Controller->view('home'));
    }

    public function test_model()
    {
        $this->assertNull($this->Controller->model('test'));
    }
}
