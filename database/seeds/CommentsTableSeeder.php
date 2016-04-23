<?php

use Illuminate\Database\Seeder;
use \App\Models\Comment;
class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $comments = [
            [
                'user_id' => 2,
                'body' => 'hey',
                'ticket_id' => 1
            ], [
                'user_id' => 3,
                'body' => 'hey hey',
                'ticket_id' => 2

            ]
        ];
        foreach ($comments as $comment)
        {
            Comment::create($comment);
        }
    }
}
