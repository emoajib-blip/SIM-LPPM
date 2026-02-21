<?php

namespace Tests\Feature;

use App\Livewire\Users\Import;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class UserImportTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Ensure roles exist for authorization middleware in routes
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        $this->seed(\Database\Seeders\RoleSeeder::class);

        // Using Excel facade mocking instead of reading real files.
        // Livewire v3 temporary uploads are bypassed by mocking Excel::toArray / Excel::import.
    }

    public function test_admin_can_access_import_page()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin lppm');

        $this->actingAs($admin)
            ->get(route('users.import'))
            ->assertSuccessful();
    }

    public function test_non_admin_cannot_access_import_page()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('users.import'))
            ->assertForbidden();
    }

    public function test_can_upload_and_parse_excel_file()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin lppm');

        \App\Models\Institution::factory()->create(['name' => 'INST']);
        \App\Models\StudyProgram::factory()->create(['name' => 'PRODI']);

        Excel::shouldReceive('toArray')
            ->andReturn([[
                ['name' => 'John Doe', 'email' => 'john@example.com', 'password' => 'password', 'nidn' => '12345', 'type' => 'dosen', 'inst' => 'INST', 'prodi' => 'PRODI', 'sinta' => '123456', 'address' => 'Jl. Test', 'birthdate' => '1990-01-01', 'birthplace' => 'Surabaya'],
            ]]);

        $file = UploadedFile::fake()->create('users.xlsx');

        Livewire::actingAs($admin)
            ->test(Import::class)
            ->set('file', $file)
            ->assertSet('isPreviewing', true)
            ->assertSet('parsedData.0.email', 'john@example.com');
    }

    public function test_can_import_users()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin lppm');

        \App\Models\Institution::factory()->create(['name' => 'INST']);
        \App\Models\StudyProgram::factory()->create(['name' => 'PRODI']);

        Excel::shouldReceive('toArray')
            ->andReturn([[
                ['name' => 'John Doe', 'email' => 'john@example.com', 'password' => 'password', 'nidn' => '12345', 'type' => 'dosen', 'inst' => 'INST', 'prodi' => 'PRODI', 'sinta' => '123456', 'address' => 'Jl. Test', 'birthdate' => '1990-01-01', 'birthplace' => 'Surabaya'],
            ]]);

        Excel::shouldReceive('import');

        $file = UploadedFile::fake()->create('users.xlsx');

        Livewire::actingAs($admin)
            ->test(Import::class)
            ->set('file', $file)
            ->call('import')
            ->assertHasNoErrors()
            ->assertDispatched('toast')
            ->assertRedirect(route('users.index'));
    }
}
