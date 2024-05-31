<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Laravel\Jetstream\Rules\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DepartmentSeeder::class);
        //$this->call(ProfessorSeeder::class);
        //$this->call(SubjectSeeder::class);

        // $this->call(AnnouncementTypeSeeder::class);
        // $this->call(AnnouncementCategorySeeder::class);
        // $this->call(AnnouncementSeeder::class);
    }
}
