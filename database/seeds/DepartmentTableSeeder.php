<?php

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->delete();
        $departments = [
            [
                'name' => 'tech',
                'description' => 'any',
                'user_id' => 1,
                'slug'=>'tech'
            ], [
                'name' => 'calls',
                'description' => 'any',
                'user_id' => 1,
                'slug'=>'calls'
            ]
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
