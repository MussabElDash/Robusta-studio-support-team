<?php

use Illuminate\Database\Seeder;

use App\Models\Priority;

class PrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->delete();
        $priorities = [
            [
                'name' => 'High',
                'value' => 1,
                'background_color' => '#0000ff',
                'name_color'=>'#ffffff',
                'description' => 'Very high priority'
            ], [
                'name' => 'Medium',
                'value' => 2,
                'background_color' => '#ff00ff',
                'name_color'=>'#ffffff',
                'description' => 'Medium priority'
            ]
        ];

        foreach ($priorities as $priority) {
            Priority::create($priority);
        }
    }
}
