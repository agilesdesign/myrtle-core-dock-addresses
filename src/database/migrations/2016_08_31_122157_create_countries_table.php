<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('alpha_2_code', 2);
            $table->string('alpha_3_code', 3);
            $table->string('capital');
            $table->string('region');
            $table->string('subregion');
            $table->json('languages');
            $table->json('translations');
            $table->json('latlng');
            $table->json('demonym');
			$table->json('calling_codes')->nullable();
            $table->json('timezones')->nullable();
            $table->json('borders');
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
        Schema::drop('countries');
    }
}
