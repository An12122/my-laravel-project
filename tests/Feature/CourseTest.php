<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    private $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // إنشاء مستخدم أدمين للاختبارات
        $this->admin = User::factory()->create([
            'email' => 'an@test.com',
        ]);
    }

    /** @test */
    public function admin_can_create_course(): void
    {
        $this->actingAs($this->admin)
            ->post(route('courses.store'), [
                'title' => 'دورة اختبارية',
                'description' => 'وصف الاختبار',
                'price' => 100,
                'rating' => 4.5,
                'image' => null,
            ])
            ->assertRedirect(route('courses.index'));

        $this->assertDatabaseHas('courses', [
            'title' => 'دورة اختبارية',
            'price' => 100,
        ]);
    }

    /** @test */
    public function admin_can_update_course(): void
    {
        $course = Course::factory()->create();

        $this->actingAs($this->admin)
            ->put(route('courses.update', $course), [
                'title' => 'دورة محدثة',
                'description' => 'وصف جديد',
                'price' => 150,
                'rating' => 5,
                'image' => null,
            ])
            ->assertRedirect(route('courses.index'));

        $this->assertDatabaseHas('courses', [
            'id' => $course->id,
            'title' => 'دورة محدثة',
            'price' => 150,
        ]);
    }

    /** @test */
    public function admin_can_delete_course(): void
    {
        $course = Course::factory()->create();

        $this->actingAs($this->admin)
            ->delete(route('courses.destroy', $course))
            ->assertRedirect();

        $this->assertDatabaseMissing('courses', [
            'id' => $course->id,
        ]);
    }
}
