<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csfFile = fopen(base_path('./dataset/animal-dataset.csv'), 'r');
        $firstLine = true;
        while(($data = fgetcsv($csfFile)) !== false) {
            if(!$firstLine) {
                Animal::create([
                    'name' => $data[0],
                ]);
            }
            $firstLine = false;
        }
        fclose($csfFile);
    }
}
