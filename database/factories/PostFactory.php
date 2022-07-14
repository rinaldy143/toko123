<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'namaBarang' => $this->faker->sentence(mt_rand(2, 8)),
            'slug' => $this->faker->slug(),
            // 'penjual' => $this->faker->name(),
            // 'image' => $this->faker->image(),
            'excerpt'=>$this->faker->paragraph(),
            // 'descBarang'=> collect($this->faker->paragraphs(mt_rand(5,10)))->map(fn($p) => "<p>$p</p>")->implode(''), mesti versi 7.4
            'descBarang'=> '<p>' .  implode('</p><p>',$this->faker->paragraphs(mt_rand(5,10))) . '</p>',
            'user_id' => mt_rand(1, 3),
            'kategori_id' => mt_rand(1, 3)
        ];
    }
}
