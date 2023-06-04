<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Course;
use Database\Factories\CourseFactory;

class CourseTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * A basic test example.
     *
     * @return void
     */

     
    public function testUserCanCreateCourse()
    {
        $courseData = [
            'creator_user_id' => 1,
            'study_program_id' => 1,
            'name' => 'Pemrograman Web Lanjut',
            'code' => 'A123',
            'course_credit' => 3,
            'lab_credit' => 1,
            'type' => 'mandatory',
            'short_description' => 'Pemrograman Web tingkat Lanjut',
            'minimal_requirement' => 'Pemrograman Web',
            'study_material_summary' => null,
            'learning_media' => 'slack',
        ];

        $response = $this->post('/api/course', $courseData);

        $response->assertStatus(201)
        ->assertJson([
            'data' => [
                'name' => 'Pemrograman Web Lanjut',
                'code' => 'A123',
            ]
        ]);

    }


}
