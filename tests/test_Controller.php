<?php

require('../app/core/Controller.php');


class test_Controller extends \PHPUnit\Framework\TestCase
{
    public function test_view()
    {
        $Controller = new Controller();
        $this->assertNull($Controller->view('test'));
    }

    public function test_model()
    {
        $Controller = new Controller();
        $this->assertNull($Controller->model('test'));
    }
}
