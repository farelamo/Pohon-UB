<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tree_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cluster_id')->constrained();
            $table->integer('tall')->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tree_details');
    }
};
