<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checks', function (Blueprint $table) {
            $table->id();
            $table->string('esdar')->nullable();
            $table->string('value')->nullable();
            $table->string('title')->nullable();
            $table->string('number')->nullable();
            $table->string('date')->nullable();
            $table->string('name')->nullable();
            $table->string('status')->default('لم يتم الدفع');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checks');
    }
};
