<?php

// This is a controller
// Find a craftsman: /Search?q=...&service=...&city=...
class Search extends \app\core\Controller
{
    public function index()
    {
        $Text = Clean_String(is_string($_GET['q'] ?? null) ? $_GET['q'] : '');
        $City = Clean_String(is_string($_GET['city'] ?? null) ? $_GET['city'] : '');
        $Service_Id = ctype_digit((string)($_GET['service'] ?? '')) ? (int)$_GET['service'] : null;

        $Service_Model = new Service;
        $Services = $Service_Model->Search_For([], 100);

        // Typing the exact name of a craft selects it
        if (!$Service_Id && $Text !== '') {
            foreach ($Services as $Service) {
                if (mb_strtolower($Service['name']) === mb_strtolower($Text) || $Service['slug'] === strtolower($Text)) {
                    $Service_Id = (int)$Service['id'];
                    $Text = '';
                }
            }
        }

        $Selected_Service = $Service_Id ? $Service_Model->Find_By_Id($Service_Id) : false;
        if ($Selected_Service && !isset($_SESSION['Searched_Services'][$Service_Id])) {
            $Service_Model->Add_Search($Service_Id);
            $_SESSION['Searched_Services'][$Service_Id] = true;
        }

        $Account_User = new Account_User;
        $this->view('Search', [
            'Text' => $Text,
            'City' => $City,
            'Service_Id' => $Selected_Service ? $Service_Id : null,
            'Selected_Service' => $Selected_Service,
            'Services' => $Services,
            'Cities' => $Account_User->Cities(),
            'Craftsmen' => $Account_User->Search_Craftsmen($Text, $Selected_Service ? $Service_Id : null, $City),
            'Companies' => (!$Selected_Service && $City === '') ? (new Company_User)->Search_Companies($Text, 6) : [],
        ]);
    }
}
