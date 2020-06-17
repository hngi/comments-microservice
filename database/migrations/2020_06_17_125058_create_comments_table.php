<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';   

            $table->id('id'); //This is the Comment ID
            $table->integer('rid'); //This might also be a string if the rid is a UUID, This is the ID of the Parent Article/Report/Statement
            $table->string('author_name', 100)->nullable(); //This is the name of the commenter
            $table->string('author_email', 100)->nullable(); //This is the email of the commenter
            $table->text('content'); //This is the comment content
            $table->integer('replies_count')->default(0); //The number of replies under a comment
            $table->integer('upvotes_count')->default(0); //The number of upvotes on a comment
            $table->integer('downvotes_count')->default(0); //The number of downvotes on a comment
            $table->boolean('is_anonymous')->default(false); //This will be true if the user does not provide his name/email
            $table->boolean('is_visible')->default(true); //This determines whether the comment is visible or not
            $table->boolean('is_reported')->default(false); //This will be set to true if a comment is reported
            $table->timestamps(); //This sets the created_at and updated_at values

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
