<?php

namespace Database\Seeders;
use App\Models\Feedback;

use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        Feedback::create([
            'content' => 'This is a dummy feedback.',
            // Add other fields as needed
        ]);
    }
}
