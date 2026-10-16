<?php
// This is a controller
class _404 extends \app\core\Controller
{
    public function index()
    {
        http_response_code(404);
        $this->view('404');
    }
}
