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
        Schema::create('open_cv', function (Blueprint $table) {
            $table->id();
            $table->integer('seeker_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('status')->default(1)->comment('0:block, 1:active');
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
        Schema::dropIfExists('open_cv');
    }
};
