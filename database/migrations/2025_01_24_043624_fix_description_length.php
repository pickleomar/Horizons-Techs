<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up()
    {
        Schema::table('themes', function (Blueprint $table) {
            $table->text('description')->change(); // Change 'description' column to TEXT type
        });
    }


    public function down()
    {
        Schema::table('themes', function (Blueprint $table) {
            $table->string('description', 255)->change(); 
        });
    }
};
