<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id', true);
            $table->string('title', 100)->nullable();
            $table->string('author', 100)->nullable();
            $table->integer('genre_id')->nullable()->index('tbl_book_genre_id_foreign');
            $table->text('description')->nullable();
            $table->string('isbn', 45)->nullable();
            $table->string('image', 100)->nullable();
            $table->date('published')->nullable();
            $table->integer('publisher_id')->nullable()->index('tbl_book_publisher_id_foreign');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book');
    }
};
