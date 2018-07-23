<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Charge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('charges', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('payment_id')->unsigned();
         $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
         $table->decimal('amount', 8, 2);
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

    }
}
