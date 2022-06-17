<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDojosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dojos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name');
            $table->integer('area_id');
            $table->string('address1');
            $table->string('address2');
            $table->float('lat');
            $table->float('lng');
            $table->string('tel');
            $table->string('url');
            $table->string('use_money');
            $table->integer('use_age');
            $table->string('use_step');
            $table->string('use_personal');
            $table->string('use_group');
            $table->string('use_affiliation');
            $table->string('use_reserve');
            $table->string('facility_inout');
            $table->string('facility_makiwara');
            $table->string('facility_aircondition');
            $table->integer('facility_matonumber');
            $table->string('facility_lockerroom');
            $table->string('facility_numberlimit');
            $table->string('facility_parking');
            $table->string('other');
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
        Schema::dropIfExists('dojos');
    }
}
