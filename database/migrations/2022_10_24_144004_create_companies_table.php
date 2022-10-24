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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name');
            $table->string('address');
            $table->string('district');
            $table->string('company_model');
            $table->string('working_time');
            $table->string('city');
            $table->string('country');
            $table->string('zipcode');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string('logo');
            $table->string('link_web');
            $table->integer('coin');
            $table->string('tax_code');
            $table->integer('is_active')->default(1);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('companies');
    }
};
