<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Contact;

class ContactsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    
    public function a_contact_can_be_added()
    {   
        $this->post('/api/contacts', $this->data());

        $contact = Contact::first();

        $this->assertCount(1, $contact);
        $this->assertEquals('Test Name', $contact->name);
        $this->assertEquals('test@email', $contact->email);
        $this->assertEquals('05/14/1988', $contact->birthday);
        $this->assertEquals('ABC String', $contact->company);
    }

    public function fields_are_required()
    {
        collect(['name', 'email', 'birthday', 'company'])
        ->each( function ($field) {
            $response = $this->post('/api/contacts', array_merge($this->data(), ['field' => '']));

            $response->assertSessionHasErrors($field);
            $this->assertCount(0, Contact::all());
        });
    }

    private function data()
    {
        return [
            'name' => 'Test Name',
            'email' => 'test@email.com',
            'birthday' => '05/14/1988',
            'company' => 'ABC String',
        ];
    }
}
