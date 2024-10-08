<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('menu_products', function (Blueprint $table) {
            $table->string('image')->nullable(); // Add image column
        });
    }
    
    public function down()
    {
        Schema::table('menu_products', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
    
};
