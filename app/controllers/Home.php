<?php

// This is a controller
class Home extends \app\core\Controller
{
    public function index()
    {
        $this->view('home', [
            'Services' => (new Service)->Most_Requested(6),
            'All_Services' => (new Service)->Search_For([], 100),
            'Projects' => (new Post)->Feed(['with_image' => true], 3),
            'Craftsmen' => (new Account_User)->Suggestions(0, 4),
            'Companies' => (new Company_User)->Search_For([], 6),
        ]);
    }
}
