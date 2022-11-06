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
        Schema::create('columns', function (Blueprint $table) {
            $table->id();
            $table->integer('collection_id');
            $table->string('title');
            $table->string('string')->nullable();
            $table->double('double')->nullable();
            $table->date('date')->nullable();
            $table->boolean('boolean')->nullable();
            $table->integer('integer')->nullable();
            $table->foreign('collection_id')->references('id')->on('collections')->cascadeOnDelete();
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
