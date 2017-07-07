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
        Schema::create('mails', function(Blueprint $table){
            $table->increments('id');
            $table->string('sender_email_address');
            $table->string('title')->nullable();
            $table->string('content')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('mail_receivers', function(Blueprint $table){
            $table->unsignedInteger('mail_id');
            $table->string('email_address');

            $table->foreign(['mail_id'])
                  ->on('mails')
                  ->references('id');
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
