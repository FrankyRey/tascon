<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVersionControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('version_control', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task');
            $table->json('content');
            $table->timestamp('version');
            $table->timestamps();

            $table->foreign('task')->references('id')->on('task');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('version_control');
    }
}
