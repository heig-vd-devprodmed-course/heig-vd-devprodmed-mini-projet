<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Episode;
use App\Models\Season;

class EpisodeSeeder extends Seeder
{
    public function run(): void
    {
        $season = Season::firstOrCreate([
            'number' => 1,
        ]);

        $episodes = [
            [
                'number' => 1,
                'title' => 'The One Where Monica Gets a Roommate (Pilot)',
                'synopsis' => 'Rachel runs from her wedding and meets the friends in the coffee place.',
                'image_url' => 'https://ik.imagekit.io/dmtrxw/friends-thumbnails/season-1/1_zgYwjjNV-.jpg',
            ],
            [
                'number' => 2,
                'title' => 'The One with the Sonogram at the End',
                'synopsis' => 'Ross\'s lesbian ex-wife is pregnant with his child.',
                'image_url' => 'https://ik.imagekit.io/dmtrxw/friends-thumbnails/season-1/2_YbP9s0d3L.jpg',
            ],
            [
                'number' => 3,
                'title' => 'The One with the Thumb',
                'synopsis' => 'Phoebe receives money after finding a thumb in a soda can.',
                'image_url' => 'https://ik.imagekit.io/dmtrxw/friends-thumbnails/season-1/3_lgsdT4-1j.jpg',
            ],
        ];

        foreach ($episodes as $episode) {
            Episode::create([
                'season_id' => $season->id,
                'number' => $episode['number'],
                'title' => $episode['title'],
                'synopsis' => $episode['synopsis'],
                'image_url' => $episode['image_url'],
            ]);
        }
    }
}
