<?php

namespace Database\Seeders;

use App\Models\Paper;
use Illuminate\Database\Seeder;

class PaperSeeder extends Seeder
{
    public function run()
    {
        Paper::create([
            'title' => 'Renewable Energy Systems in Nigeria',
            'slug' => 'renewable-energy-nigeria',
            'author' => 'John Doe',
            'abstract' => 'This paper explores the potential of renewable energy systems in Nigeria.',
            'file_path' => 'papers/renewable-energy.pdf',
        ]);
    }
}
