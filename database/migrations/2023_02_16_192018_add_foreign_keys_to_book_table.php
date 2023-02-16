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
        Schema::table('book', function (Blueprint $table) {
            $table->foreign(['genre_id'], 'tbl_book_genre_id_foreign')->references(['id'])->on('genre')->onUpdate('SET NULL')->onDelete('SET NULL');
            $table->foreign(['publisher_id'], 'tbl_book_publisher_id_foreign')->references(['id'])->on('publisher')->onUpdate('SET NULL')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book', function (Blueprint $table) {
            $table->dropForeign('tbl_book_genre_id_foreign');
            $table->dropForeign('tbl_book_publisher_id_foreign');
        });
    }
};
