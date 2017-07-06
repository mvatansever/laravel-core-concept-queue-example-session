<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table){
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('content')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('mail_receivers', function (Blueprint $table){
            $table->unsignedInteger('mail_id');
            $table->string('mail_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_receivers');
        Schema::dropIfExists('mails');
    }
}
