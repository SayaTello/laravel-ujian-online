<?php

namespace Database\Seeders;

use App\Models\opsi;
use App\Models\soal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        soal::factory(30)
        ->has(opsi::factory()->count(3))
        ->create();
        // opsi::factory(30)->create();

        // opsi::factory(120)->create();

        // $n = collect()->range(0, 119);

        // foreach ($n as $key => $value){
        //     $count = opsi::where('pilihan', $value)->count();
        //     if ($count < 1) {
        //         $opsi = new opsi;
        //         $opsi->user_id = $value;
        //         $opsi->save();
        //     }
        // }

        $this->call(UserSeeder::class);

    }
}
