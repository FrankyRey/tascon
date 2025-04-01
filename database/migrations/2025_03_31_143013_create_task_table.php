<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('description', 150)->nullable();
            $table->boolean('delete')->default(false);
            $table->date('delete_date')->nullable();
            $table->unsignedBigInteger('owner');
            $table->unsignedBigInteger('status');
            $table->timestamps();

            $table->foreign('owner')->references('id')->on('user');
            $table->foreign('status')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
