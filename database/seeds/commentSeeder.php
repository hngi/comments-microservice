<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class commentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("comments")->insert([
        	['author_name' => "Yusuf Abdulrahman", "author_email" => "abdulrahmanyusuf125@gmail.com", "content" => "Lorem Ipsum Dolor Sit Amet Consecteur Adipsciscing...", "origin" => "1fw59engtrwyn2u262t93hevtw8292jwgwt84jtu7"],
        	['author_name' => "Yusuf Kehinde", "author_email" => "abdulrahmanyusuf12@gmail.com", "content" => "ELKSSorem Ipsum Dolor ksskiwsi Amet Adamaosu Elixur...", "origin" => "93u33y2gwfrwrqu2i2gqr6478r9ihddfttyre89rj"],
        	['author_name' => "Yusuf Kenny", "author_email" => "abdulrahmanyusuf1@gmail.com", "content" => "LSSorSSem SIApsuZm Dolor Sidjdjddt Affmet Cofnsfecteur Adhipshchhhiscing...", "origin" => "j3ye78snshst78w9wjwgrw6w7w8uwhwgwrq4q67w9"],
        	['author_name' => "Yusuf Abdulrahman", "author_email" => "abdulrahmanyusuf@gmail.com", "content" => "LSJJEorem EEIEpFsum FDoHlor SGit AHmet Consecteur Adipsciscing...", "origin" => "hsy6w7w8ijwywtw6w6w7w899rijfseeatajaoa099"],
        	
        ]);
    }
}
