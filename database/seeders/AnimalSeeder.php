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
        $secondLine = true;
        while(($data = fgetcsv($csfFile)) !== false) {
            if(!$firstLine && !$secondLine) {
                $imgLoc = 'images/animals/'.$data[0].'.jpg';
                Animal::create([
                    'name' => $data[0],
                    'height' => $data[1],
                    'weight' => $data[2],
                    'color' => $data[3],
                    'lifespan' => $data[4],
                    'diet' => $data[5],
                    'habitat' => $data[6],
                    'predators' => $data[7],
                    'avgspeed' => $data[8],
                    'topspeed' => $data[13],
                    'countries' => $data[9],
                    'conservationStatus' => $data[10],
                    'family' => $data[11],
                    'socialStructure' => $data[14],
                    'image' => $imgLoc,
                    'description' => $data[16],
                ]);
            }
            if (!$firstLine){
                $secondLine = false;
            }
            $firstLine = false;
        }
        fclose($csfFile);
    }
}
