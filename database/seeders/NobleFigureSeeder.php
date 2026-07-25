<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NobleFigure;

class NobleFigureSeeder extends Seeder
{
    public function run(): void
    {
        $figures = [
            [
                'name' => 'سمو الأمير',
                'role' => 'الاسم الكريم',
                'desc' => 'سيرة موجزة تُضاف لاحقًا من قبل العائلة، وفق البيانات الرسمية.',
                'image' => '/images/princes/1.jpg',
            ],
            [
                'name' => 'سمو الأمير',
                'role' => 'الاسم الكريم',
                'desc' => 'سيرة موجزة تُضاف لاحقًا من قبل العائلة، وفق البيانات الرسمية.',
                'image' => '/images/princes/2.jpg',
            ],
            [
                'name' => 'سمو الأمير',
                'role' => 'الاسم الكريم',
                'desc' => 'سيرة موجزة تُضاف لاحقًا من قبل العائلة، وفق البيانات الرسمية.',
                'image' => '/images/princes/3.jpg',
            ],
        ];

        foreach ($figures as $figure) {
            NobleFigure::create($figure);
        }
    }
}