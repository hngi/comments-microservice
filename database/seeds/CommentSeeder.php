<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'author_name' => Str::random(10),
            'author_email' => Str::random(10).'@gmail.com',
            'hash' => Str::random(32),
            'content' => Str::random(50)
        ]);
    }
}
