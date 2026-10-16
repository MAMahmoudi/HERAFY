<?php

// This is a controller
// Public page of a company: /Company_Page/{id}
class Company_Page extends \app\core\Controller
{
    public function index($id = null)
    {
        if ($id === null) {
            Require_Login('company');
            $id = Current_User()['id'];
        }

        $Company = ctype_digit((string)$id) ? (new Company_User)->Find_By_Id($id) : false;
        if (!$Company) {
            $this->Not_Found();
        }

        $Product = new Product;
        $Product->My_Order = 'id desc';
        $this->view('Company_Page', [
            'Company' => $Company,
            'Is_Owner' => Is_Logged_In('company') && Current_User()['id'] === (int)$Company['id'],
            'Products' => $Product->Search_For(['company_id' => (int)$Company['id']], 100),
            'Posts' => (new Post)->Feed(['author_type' => 'company', 'author_id' => $Company['id']], 50),
            'Sponsored' => (new Sponsorship)->Sponsored_By($Company['id']),
            'Tab' => in_array($_GET['tab'] ?? '', ['products', 'posts', 'sponsored'], true) ? $_GET['tab'] : 'products',
        ]);
    }

    public function add_product()
    {
        Require_Login('company');
        if (!Is_Post()) {
            Redirect_To('Company_Page');
        }
        Verify_Csrf();
        $Company_Id = Current_User()['id'];

        $Product = new Product;
        if (!$Product->Verify_My_Data($_POST)) {
            foreach ($Product->My_Errors as $Error) {
                Flash('error', $Error);
            }
            Redirect_To('Company_Page/' . $Company_Id);
        }

        $Image = Upload_Image($_FILES['image'] ?? null, 'products', $Upload_Error);
        if ($Image === false) {
            Flash('error', $Upload_Error);
            Redirect_To('Company_Page/' . $Company_Id);
        }

        $Price = trim($_POST['price'] ?? '');
        $Product->Insert([
            'company_id' => $Company_Id,
            'name' => Clean_String($_POST['name']),
            'description' => Clean_String($_POST['description'] ?? '') ?: null,
            'price' => $Price === '' ? null : (float)$Price,
            'image' => $Image,
        ]);
        Flash('success', 'تمت إضافة المنتج');
        Redirect_To('Company_Page/' . $Company_Id);
    }

    public function delete_product($id = 0)
    {
        Require_Login('company');
        if (!Is_Post()) {
            Redirect_To('Company_Page');
        }
        Verify_Csrf();
        $Company_Id = Current_User()['id'];

        $Product = new Product;
        $Row = $Product->Single_Result(['id' => (int)$id, 'company_id' => $Company_Id]);
        if ($Row) {
            $Product->Delete(['id' => $Row['id']]);
            Delete_Upload($Row['image']);
            Flash('success', 'تم حذف المنتج');
        }
        Redirect_To('Company_Page/' . $Company_Id);
    }
}
