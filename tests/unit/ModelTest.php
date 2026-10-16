<?php

class ModelTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        Fresh_Test_Database(false);
    }

    public function testInsertReturnsTheNewId()
    {
        $Contact_Message = new Contact_Message;
        $id = $Contact_Message->Insert(['name' => 'Amine', 'email' => 'a@b.dz', 'subject' => 'Hi', 'message' => 'Hello']);

        $this->assertSame(1, $id);
        $this->assertSame('Amine', $Contact_Message->Find_By_Id($id)['name']);
    }

    public function testInsertIgnoresUnknownColumns()
    {
        $Contact_Message = new Contact_Message;
        $id = $Contact_Message->Insert(['name' => 'A', 'email' => 'a@b.dz', 'subject' => 'S', 'message' => 'M', 'is_admin' => 1]);

        $this->assertArrayNotHasKey('is_admin', $Contact_Message->Find_By_Id($id));
    }

    public function testSingleResultWithSeveralConditions()
    {
        $Contact_Message = new Contact_Message;
        $Contact_Message->Insert(['name' => 'A', 'email' => 'a@b.dz', 'subject' => 'One', 'message' => 'M']);
        $Contact_Message->Insert(['name' => 'A', 'email' => 'a@b.dz', 'subject' => 'Two', 'message' => 'M']);

        $this->assertSame('Two', $Contact_Message->Single_Result(['name' => 'A', 'subject' => 'Two'])['subject']);
        $this->assertFalse($Contact_Message->Single_Result(['name' => 'B']));
    }

    public function testUpdateChangesOnlyTheGivenRow()
    {
        $Contact_Message = new Contact_Message;
        $First = $Contact_Message->Insert(['name' => 'A', 'email' => 'a@b.dz', 'subject' => 'S', 'message' => 'M']);
        $Second = $Contact_Message->Insert(['name' => 'B', 'email' => 'b@b.dz', 'subject' => 'S', 'message' => 'M']);

        $this->assertTrue($Contact_Message->Update($First, ['subject' => 'Changed']));
        $this->assertSame('Changed', $Contact_Message->Find_By_Id($First)['subject']);
        $this->assertSame('S', $Contact_Message->Find_By_Id($Second)['subject']);
    }

    public function testDeleteAndCount()
    {
        $Contact_Message = new Contact_Message;
        $id = $Contact_Message->Insert(['name' => 'A', 'email' => 'a@b.dz', 'subject' => 'S', 'message' => 'M']);
        $Contact_Message->Insert(['name' => 'B', 'email' => 'b@b.dz', 'subject' => 'S', 'message' => 'M']);

        $this->assertSame(2, $Contact_Message->Count());
        $this->assertSame(1, $Contact_Message->Delete(['id' => $id]));
        $this->assertSame(1, $Contact_Message->Count());
        $this->assertSame([], $Contact_Message->Search_For(['name' => 'A']));
    }

    public function testDeleteWithoutConditionIsRefused()
    {
        $this->expectException(InvalidArgumentException::class);
        (new Contact_Message)->Delete([]);
    }

    public function testUnknownColumnInConditionIsRefused()
    {
        $this->expectException(InvalidArgumentException::class);
        (new Contact_Message)->Single_Result(['1=1 or name' => 'x']);
    }
}
