<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\News\Enums\StatusEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => fake()->jobTitle(),
                'author' => fake()->userName(),
                'image' => fake()->imageUrl(),
                'description' => fake()->text(100),
                'created_at'  => now()->timezone("Europe/Minsk"),
                'updated_at' => now()->timezone("Europe/Minsk"),
            ];
        }

        return $data;
    }
}
