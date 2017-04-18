<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlAccessLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new App\UrlAccessLog)->getTable(), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('url_id')->unsigned()->nullable();
            $table->bigInteger('user_agent_id')->unsigned()->nullable();
            $table->string('country_code', 2)->nullable();
            $table->string('ip', 45);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on((new App\User)->getTable());
            $table->foreign('url_id')->references('id')->on((new App\Url)->getTable());
            $table->foreign('user_agent_id')->references('id')->on((new App\UserAgent)->getTable());
            $table->foreign('country_code')->references('code')->on((new App\Country)->getTable());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists((new App\UrlAccessLog)->getTable());
    }
}
