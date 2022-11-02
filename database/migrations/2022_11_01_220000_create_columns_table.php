<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columns', function (Blueprint $table) {
            $table->id();

            $table->integer('collection_id');
            $table->integer('column_id');
            $table->string('string')->nullable();
            $table->boolean('boolean')->nullable();
            $table->double('double')->nullable();
            $table->integer('integer')->nullable();
            $table->date('date')->nullable();
            $table->integer('column_length')->nullable();
            $table->foreign('collection_id')->on('collections')->references('id')->cascadeOnDelete();
            $table->foreign('column_id')->on('columns')->references('id');
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
        Schema::dropIfExists('columns');
    }
};
