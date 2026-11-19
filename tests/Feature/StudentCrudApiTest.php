<?php

use App\Models\Diak;
use App\Models\User;

function createStudentCrudAdmin(): User
{
    $user = User::factory()->create();
    $user->role = 1;
    $user->save();

    return $user;
}

test('admin can retrieve the student list as json', function () {
    $admin = createStudentCrudAdmin();
    Diak::create(['nev' => 'Test Student', 'osztaly' => '12/A', 'fiu' => 1]);

    $this->actingAs($admin)
        ->getJson('/students/data')
        ->assertOk()
        ->assertJsonFragment(['nev' => 'Test Student', 'osztaly' => '12/A']);
});

test('admin can create a student through the json endpoint', function () {
    $admin = createStudentCrudAdmin();

    $response = $this->actingAs($admin)->postJson('/students', [
        'nev' => 'New Student',
        'osztaly' => '11/B',
        'fiu' => 0,
    ]);

    $response->assertCreated()->assertJsonFragment(['nev' => 'New Student', 'osztaly' => '11/B']);
    expect(Diak::where('nev', 'New Student')->exists())->toBeTrue();
});

test('student creation validates required fields', function () {
    $admin = createStudentCrudAdmin();

    $this->actingAs($admin)->postJson('/students', [])
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['nev', 'osztaly', 'fiu']);
});

test('admin can update a student', function () {
    $admin = createStudentCrudAdmin();
    $student = Diak::create(['nev' => 'Old Name', 'osztaly' => '10/A', 'fiu' => 0]);

    $this->actingAs($admin)->putJson('/students/'.$student->id, [
        'nev' => 'Updated Name',
        'osztaly' => '10/B',
        'fiu' => 1,
    ])->assertOk()->assertJsonFragment(['nev' => 'Updated Name', 'osztaly' => '10/B']);

    expect($student->fresh()->nev)->toBe('Updated Name');
});

test('admin can delete a student', function () {
    $admin = createStudentCrudAdmin();
    $student = Diak::create(['nev' => 'Delete Me', 'osztaly' => '9/A', 'fiu' => 0]);

    $this->actingAs($admin)->deleteJson('/students/'.$student->id)->assertOk();

    expect(Diak::find($student->id))->toBeNull();
});

test('non admin cannot access the student json endpoints', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->getJson('/students/data')->assertRedirect('/messages');
});

test('guest cannot access the student json endpoints', function () {
    $this->get('/students/data')->assertRedirect('/login');
});


test('admin can update student data with validated fields', function () {
    $admin = createStudentCrudAdmin();
    $student = Diak::create(['nev' => 'Before Update', 'osztaly' => '9/A', 'fiu' => 0]);

    $this->actingAs($admin)->putJson('/students/'.$student->id, [
        'nev' => 'After Update',
        'osztaly' => '10/C',
        'fiu' => 1,
    ])->assertOk()->assertJsonFragment([
        'nev' => 'After Update',
        'osztaly' => '10/C',
        'fiu' => 1,
    ]);

    expect($student->fresh()->osztaly)->toBe('10/C');
});

test('student update validates all required fields', function () {
    $admin = createStudentCrudAdmin();
    $student = Diak::create(['nev' => 'Validation Student', 'osztaly' => '9/A', 'fiu' => 0]);

    $this->actingAs($admin)->putJson('/students/'.$student->id, [])
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['nev', 'osztaly', 'fiu']);
});

test('non admin cannot create students', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->postJson('/students', [
        'nev' => 'Forbidden Student',
        'osztaly' => '10/A',
        'fiu' => 1,
    ])->assertRedirect('/messages');

    expect(Diak::where('nev', 'Forbidden Student')->exists())->toBeFalse();
});

test('non admin cannot update students', function () {
    $user = User::factory()->create();
    $student = Diak::create(['nev' => 'Protected Student', 'osztaly' => '10/A', 'fiu' => 0]);

    $this->actingAs($user)->putJson('/students/'.$student->id, [
        'nev' => 'Tampered Student',
        'osztaly' => '11/A',
        'fiu' => 1,
    ])->assertRedirect('/messages');

    expect($student->fresh()->nev)->toBe('Protected Student');
});

test('non admin cannot delete students', function () {
    $user = User::factory()->create();
    $student = Diak::create(['nev' => 'Protected Delete', 'osztaly' => '10/A', 'fiu' => 0]);

    $this->actingAs($user)->deleteJson('/students/'.$student->id)
        ->assertRedirect('/messages');

    expect(Diak::find($student->id))->not->toBeNull();
});

test('student list endpoint returns an empty json array when no students exist', function () {
    $admin = createStudentCrudAdmin();

    $this->actingAs($admin)->getJson('/students/data')
        ->assertOk()
        ->assertExactJson([]);
});
