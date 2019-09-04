<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Note;

class NoteTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPageAvailability()
    {
        $response = $this->get('notes');

        $response->assertStatus(200);
    }

    public function testCanCreateNote()
    {
        $note = factory('App\Note')->create();

        $this->post('notes-store', $note->toArray());

        $this->assertEquals(1, Note::all()->count());
    }

    public function testCanShowNote()
    {
        $note = factory('App\Note')->create();

        $response = $this->get('notes/'.$note->id, $note->toArray());

        $response->assertStatus(200);
    }


    public function testCanDeleteNote()
    {
        $note = factory('App\Note')->create();

        $this->delete('notes/'.$note->id);

        $this->assertDatabaseMissing('notes',['id'=> $note->id]);
    }
}
