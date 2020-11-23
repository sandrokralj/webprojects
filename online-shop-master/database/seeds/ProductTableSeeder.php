<?php

use Illuminate\Database\Seeder;



class ProductTableSeeder extends Seeder
{
    public function run()
    {
        $product = new \App\Product([
            'imagePath1' => 'src/img/category/1.jpg',
            'imagePath2' => 'src/img/category/2.jpg',
            'imagePath3' => 'src/img/category/3.jpg',
            'title' => 'Beautiful dress',
            'price' => 59,
            'description' => 'Officia, inventore laudantium, voluptatum blanditiis quia alias esse temporibus doloribus in repudiandae labore vitae, voluptates, laborum maxime aperiam sapiente beatae! Quaerat, illum.',
        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath1' => 'src/img/category/6.jpg',
            'imagePath2' => 'src/img/category/5.jpg',
            'imagePath3' => 'src/img/category/7.jpg',
            'title' => 'Beautiful item',
            'price' => 649,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, inventore laudantium, voluptatum blanditiis quia alias esse temporibus doloribus in repudiandae labore vitae, voluptates, laborum maxime aperiam sapiente beatae! Quaerat, illum.',
        ]);
        $product->save();
    }
}
