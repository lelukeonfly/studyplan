<?php

namespace Database\Seeders;

use App\Models\Impulse;
use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImpulseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = Topic::inRandomOrder()->get();
        $topicCount = count($topics);
        Impulse::factory($topicCount*3)->create();
        foreach($topics as $topic){
            $impulses = Impulse::inRandomOrder()->take(3)->get();
            $topic->impulses()->attach($impulses);
        };
    }
}
