<?php

use Illuminate\Database\Seeder;

use App\Models\Label;

class LabelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labels')->delete();
        $labels = [
            [
                'name' => 'High',
                'background_color' => '#0000ff',
                'name_color'=>'#ffffff',
                'description' => 'Very high priority'
            ], [
                'name' => 'Medium',
                'background_color' => '#ff00ff',
                'name_color'=>'#ffffff',
                'description' => 'Medium priority'
            ]
        ];

        foreach ($labels as $label) {
            Label::create($label);
        }
    }
}
