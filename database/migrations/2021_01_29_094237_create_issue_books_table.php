<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssueBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_books', function (Blueprint $table) {
            $table->id();
            $table->integer('book_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('st_id')->nullable();
            $table->date('issue_date')->nullable();
            $table->date('return_date')->nullable();
            $table->integer('issue_quantity')->nullable();
            $table->tinyinteger('status')->default('1');
            $table->tinyinteger('return_book');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issue_books');
    }
}
