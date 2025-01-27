<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('book_id');

            $table->text('review');
            $table->unsignedTinyInteger('rating');

            $table->timestamps();

            /**
             * To define a foreign key = foreign('...')
             * references('...') this specifies what column on the other table this foreign key references.
             * on('...') this needs to be included to reference the table.
             * onDelete('...') specifying it to be cascade. When a book is deleted, all relating reviews will be deleted too.
             *  */
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');

            // Alternatively, shorter syntax is the following, however line 17 will need to be uncommented/removed for the following to work.
            // $table->foreignId('book_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
