<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnFacilityNumberlimitDojosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dojos', function (Blueprint $table) {
            $table->string('facility_numberlimit', 250)->nullable()->comment('人数制限あるかどうか(コロナの影響で)')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dojos', function (Blueprint $table) {
            $table->string('facility_numberlimit', 20)->nullable()->comment('人数制限あるかどうか(コロナの影響で)')->change();
        });
    }
}
