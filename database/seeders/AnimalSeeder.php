<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
                $filepath = '/animals/'. str_replace("'", "_", $data[0]) .'.jpg';
                $filename = 'animals/'. $data[0] . '.jpg';
                $path = 'public/images/animals/' . $data[0] . '.jpg';

                Storage::disk('google')->put($filename, File::get($path), 'public');
                $downloadableUrl = Storage::cloud()->url($filepath);

                if (preg_match('/\/file\/d\/([a-zA-Z0-9_-]+)/', $downloadableUrl, $matches)) {
                    $fileId = $matches[1];
                    $url = 'https://drive.google.com/thumbnail?id=' . $fileId . '&sz=w1000';
                }
                
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
                    'gestationPeriod' => $data[12],
                    'socialStructure' => $data[14],
                    'image' => $url,
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
