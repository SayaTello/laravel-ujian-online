<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\opsi>
 */
class opsiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // for ($i=0; $i < 120; $i++) { 
        // return [
        //         'pilihan' => $this->faker->sentence(),
        //         'soal_id' => ($i % 4),
        //     ];
        // }

        $x = collect()->range(0, 29);
        $x2 = collect()->range(0, 1);
        return [
            'pilihan' => $this->faker->sentence(),
            'soal_id' => $x->random(),
            'status' => $x2->random(),
        ];
    }
}
