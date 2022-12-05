<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tree_types', function (Blueprint $table) {
            $table->text('ori_icon')->after('name')->nullable();
            $table->text('modif_icon')->after('ori_icon')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tree_types', function (Blueprint $table) {
            $table->dropColumn('modif_icon');
            $table->dropColumn('ori_icon');
        });
    }
};
