<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeoLitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new App\GeoLite())->getTable(), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('start', 45);
            $table->string('end', 45);
            $table->string('country_code', 2);
            $table->timestamps();

            $table->index(['start', 'end']);

            $table->foreign('country_code')->references('code')->on((new App\Country())->getTable());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists((new App\GeoLite())->getTable());
    }
}
