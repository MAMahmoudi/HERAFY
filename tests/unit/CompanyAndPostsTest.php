<?php

class CompanyAndPostsTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        Fresh_Test_Database();
    }

    public function testCompanyValidation()
    {
        $Company_User = new Company_User;
        $this->assertFalse($Company_User->Verify_My_Data(['name' => 'X', 'email' => 'x@x.dz', 'password' => 'secret-password', 'password_confirm' => 'secret-password', 'website' => 'not a url']));
        $this->assertSame(['website'], array_keys($Company_User->My_Errors));
    }

    public function testFeedJoinsTheAuthors()
    {
        $Feed = (new Post)->Feed();
        $this->assertCount(7, $Feed);

        foreach ($Feed as $Post) {
            $Author = Post_Author($Post);
            $this->assertNotEmpty(trim($Author['name']));
        }

        $Company_Post = array_values(array_filter($Feed, fn($Post) => $Post['author_type'] === 'company'))[0];
        $this->assertSame('أدوات الحرفي', Post_Author($Company_Post)['name']);
    }

    public function testFeedFilters()
    {
        $Post = new Post;
        $this->assertCount(1, $Post->Feed(['author_type' => 'account', 'author_id' => 1]));
        foreach ($Post->Feed(['with_image' => true]) as $Row) {
            $this->assertNotNull($Row['image']);
            $this->assertSame('account', $Row['author_type']);
        }
    }

    public function testEmptyPostIsRefused()
    {
        $Post = new Post;
        $this->assertFalse($Post->Verify_My_Data(['body' => '   ']));
        $this->assertTrue($Post->Verify_My_Data(['body' => 'Hello']));
    }

    public function testProductValidation()
    {
        $Product = new Product;
        $this->assertFalse($Product->Verify_My_Data(['name' => '', 'price' => '-3']));
        $this->assertEqualsCanonicalizing(['name', 'price'], array_keys($Product->My_Errors));
        $this->assertTrue($Product->Verify_My_Data(['name' => 'Ciment', 'price' => '']));
    }

    public function testDeletingACompanyDeletesItsProductsAndSponsorships()
    {
        (new Company_User)->Delete(['id' => 2]);
        $this->assertSame(0, (new Product)->Count(['company_id' => 2]));
        $this->assertSame(0, (new Sponsorship)->Count(['company_id' => 2]));
    }

    public function testSponsorships()
    {
        $Sponsorship = new Sponsorship;
        $this->assertTrue($Sponsorship->Exists(2, 1));
        $this->assertFalse($Sponsorship->Exists(1, 1));
        $this->assertSame('أدوات الحرفي', $Sponsorship->Sponsors_Of(1)[0]['name']);
        $this->assertSame('هواري', $Sponsorship->Sponsored_By(2)[0]['first_name']);
    }

    public function testMostRequestedServicesFollowSearches()
    {
        $Service = new Service;
        $Tailor = $Service->Single_Result(['slug' => 'tailor']);
        $Service->Add_Search($Tailor['id']);

        $Most_Requested = $Service->Most_Requested(6);
        $this->assertCount(6, $Most_Requested);
        $this->assertSame('tailor', $Most_Requested[0]['slug']);
    }

    public function testContactMessageValidation()
    {
        $Contact_Message = new Contact_Message;
        $this->assertFalse($Contact_Message->Verify_My_Data(['name' => 'A', 'email' => 'bad', 'subject' => 'S', 'message' => 'M']));
        $this->assertSame(['email'], array_keys($Contact_Message->My_Errors));
    }
}
