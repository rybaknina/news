<?php
declare(strict_types=1);

namespace App\Http\Controllers;

trait NewsTrait
{
    public function getNews(int $id = null): array
    {
        $news = [];
        $quantityNews = 10;
        $getCurrentNews = static function (int $id): array {
            return [
                'id' => $id,
                'title' => fake()->jobTitle(),
                'author' => fake()->userName(),
                'image' => fake()->imageUrl(),
                'status' => 'DRAFT',
                'description' => fake()->text(100),
                'created_at' => now()->format('d-m-Y H:i')
            ];
        };

        if ($id === null) {
            for ($i = 1; $i < $quantityNews; $i++) {
                $news[$i] = $getCurrentNews($i + 1);
            }

            return $news;
        }

        return $getCurrentNews($id);
    }
}
