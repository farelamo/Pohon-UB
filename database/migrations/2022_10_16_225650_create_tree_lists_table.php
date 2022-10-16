<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreeListsTable extends Migration
{
    
    public function up()
    {
        Schema::create('tree_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tree_type_id')->constrained();
            $table->foreignId('location_id')->constrained();
            $table->text('details');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tree_lists');
    }
}
