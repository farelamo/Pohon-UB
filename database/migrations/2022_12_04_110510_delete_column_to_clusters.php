<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('clusters', function (Blueprint $table) {
            $table->dropColumn('avg_tall');
            $table->dropColumn('tree_count');
        });
    }

    public function down()
    {
        Schema::table('clusters', function (Blueprint $table) {
            $table->double('avg_tall', 3,2)->nullable();
            $table->integer('tree_count')->unsigned()->nullable();
        });
    }
};
