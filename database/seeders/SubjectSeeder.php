<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            'Italienisch',
            'Mathematik',
            'Englisch',
            'Deutsch',
            'Geschichte',
            'Physik',
            'Berufs und Wirtschaftslehre',
            'IWS und PROM',
            'Allgemeinbildung',
        ];
        foreach($subjects as $subject){
            \App\Models\Subject::create(['name' => $subject]);
        }
    }
}
