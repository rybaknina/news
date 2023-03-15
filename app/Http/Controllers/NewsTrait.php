<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Faker\Factory;

trait NewsTrait
{
    public function getNews(int $id = null): array
    {
        $news = [];
        $quantityNews = 10;
        $faker = Factory::create();

        if ($id) {
            return [
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'status' => 'DRAFT',
                'description' => $faker->text(100),
                'created_at' => $faker->dateTime('Europe/Minsk')
            ];
        }

        for ($i = 1; $i < $quantityNews; $i++) {
            $news[$i] = [
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'status' => 'DRAFT',
                'description' => $faker->text(100),
                'created_at' => $faker->dateTime('Europe/Minsk')
            ];
        }
        return $news;
    }
}
