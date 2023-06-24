<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = Subject::inRandomOrder()->get();
        foreach($subjects as $subject){
            Topic::factory(5)->create(['subject_id' => $subject->id]);
        };
    }
}
