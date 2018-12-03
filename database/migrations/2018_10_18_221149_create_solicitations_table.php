<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('requester_user_id');
            $table->integer('requested_user_id');
            $table->integer('requesters_pet_id');
            $table->integer('requesteds_pet_id');

            $table->string('status');

            $table->timestamps();

            $table->foreign('requester_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('requested_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('requesters_pet_id')->references('id')->on('pets')->onDelete('cascade');
            $table->foreign('requesteds_pet_id')->references('id')->on('pets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitations');
    }
}
