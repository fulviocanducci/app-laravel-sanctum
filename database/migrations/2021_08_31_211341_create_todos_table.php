<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('description', 100);
            $table->boolean('active');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('users', function(Blueprint $table){
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
