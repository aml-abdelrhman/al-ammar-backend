<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

  public function run(): void
{
    $this->call(FigureSeeder::class);
    $this->call(NobleFigureSeeder::class);
    $this->call(NotableMemberSeeder::class);
    $this->call(ScholarSeeder::class);
    $this->call(CharityInitiativeSeeder::class);
    $this->call(CourseSyllabusSeeder::class);
}

    
}
