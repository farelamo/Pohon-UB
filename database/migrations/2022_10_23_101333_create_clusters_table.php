<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clusters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tree_type_id')->constrained();
            $table->foreignId('location_id')->constrained();
            $table->string('name', 100);
            $table->text('donatures');
            $table->json('polygon_data');
            $table->double('avg_tall', 3,2)->nullable();
            $table->integer('tree_count')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clusters');
    }
};
