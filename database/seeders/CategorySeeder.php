<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ["frontend","backend","style"];

        for($i=0;count($categories)>$i;$i++){
            Categories::create([
                "name"=>$categories[$i]
            ]);
                }
    }
}
