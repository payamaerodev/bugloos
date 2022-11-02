<?php

use App\Enums\Type;
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
        Type::up();
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->addColumn('colType', 'type');
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
        Type::down();
        Schema::dropIfExists('collections');
    }
};
